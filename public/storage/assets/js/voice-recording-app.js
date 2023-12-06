//webkitURL is deprecated but nevertheless
URL = window.URL || window.webkitURL;

var gumStream; 						//stream from getUserMedia()
var rec; 							//Recorder.js object
var input; 							//MediaStreamAudioSourceNode we'll be recording
var chunks = [];
var audioBlob;
var isRecording = false;
var mediaRecorder;
var audioElement = null;
var liElement = null;
// shim for AudioContext when it's not avb.
var AudioContext = window.AudioContext || window.webkitAudioContext;
var audioContext //audio context to help us record

var voiceRecordButton = document.getElementById("voiceRecordButton");
var voiceStopButton = document.getElementById("voiceStopButton");
var isRecording = false;
//add events to those 2 buttons
voiceRecordButton.addEventListener("click", startRecording);
voiceStopButton.addEventListener("click", stopRecording);

// Helper function to update the progress bar
function updateProgressBar() {
	const progressBar = document.getElementById('recordingBar');
	const currentTime = Date.now() - startTime;
	const maxDuration = 200000; // Maximum duration of the recording in milliseconds (10 seconds)
	const percentage = (currentTime / maxDuration) * 100;
	//progressBar.value = percentage;
	//progressBar.innerHTML = `${percentage.toFixed(2)}%`;
	//const RecTim = currentTime / 1000;
	function formatTime(milliseconds) {
		const seconds = Math.floor(milliseconds / 1000) % 60;
		const minutes = Math.floor(milliseconds / 1000 / 60) % 60;
		return `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
	}

	const currentTimeFormatted = formatTime(currentTime);
	const maxDurationFormatted = formatTime(maxDuration);

	progressBar.innerHTML = `
	<div class="waveContainer">
		<div class="waverec wave1"></div>
		<div class="waverec wave2"></div>
		<div class="waverec wave3"></div>
		<div class="waverec wave4"></div>
		<div class="waverec wave5"></div>
	</div>`;
	document.getElementById('recTime').innerHTML = `Duration: ${currentTimeFormatted}`;

}

function startRecording() {
	if (isRecording) {
		console.log("Already recording...");
		return;
	}

	voiceStopButton.style.display = "block";
	voiceRecordButton.style.display = "none";

	startTime = Date.now(); // Set the recording start time

	// Start updating the progress bar at regular intervals (e.g., every 100ms)
	progressBarInterval = setInterval(updateProgressBar, 100);

	console.log("voiceRecordButton clicked");

	/*
		Simple constraints object, for more advanced audio features see
		https://addpipe.com/blog/audio-constraints-getusermedia/
	*/

	var constraints = { audio: true, video: false }

	/*
	  Disable the record button until we get a success or fail from getUserMedia()
  */

	voiceRecordButton.disabled = true;
	voiceStopButton.disabled = false;

	/*
		We're using the standard promise based getUserMedia()
		https://developer.mozilla.org/en-US/docs/Web/API/MediaDevices/getUserMedia
	*/

	navigator.mediaDevices.getUserMedia(constraints).then(function (stream) {
		console.log("getUserMedia() success, stream created, initializing Recorder.js ...");

		/*
			create an audio context after getUserMedia is called
			sampleRate might change after getUserMedia is called, like it does on macOS when recording through AirPods
			the sampleRate defaults to the one set in your OS for your playback device

		*/
		audioContext = new AudioContext();

		//update the format
		document.getElementById("formats").innerHTML = "Format: 1 channel pcm @ " + audioContext.sampleRate / 1000 + "kHz"

		/*  assign to gumStream for later use  */
		gumStream = stream;

		/* use the stream */
		input = audioContext.createMediaStreamSource(stream);

		/*
			Create the Recorder object and configure to record mono sound (1 channel)
			Recording 2 channels  will double the file size
		*/
		rec = new Recorder(input, { numChannels: 1 })

		//start the recording process
		rec.record()
		isRecording = true;
		console.log("Recording started");

	}).catch(function (err) {
		//enable the record button if getUserMedia() fails
		voiceRecordButton.disabled = false;
		voiceStopButton.disabled = true;
	});
}

function stopRecording() {
	if (!isRecording) {
		console.log("No active recording to stop...");
		return;
	}
	console.log("voiceStopButton clicked");

	//disable the stop button, enable the record too allow for new recordings
	voiceStopButton.disabled = true;
	voiceRecordButton.disabled = false;
	isRecording = false;

	//tell the recorder to stop the recording
	rec.stop();

	document.getElementById("recordingBar").innerHTML = `
	<div class="waveContainer"></div>`;

	clearInterval(progressBarInterval); // Clear the interval when stopping recording

	document.getElementById('audio-section').style.display = "none";

	//stop microphone access
	gumStream.getAudioTracks()[0].stop();

	//create the wav blob and pass it on to createDownloadLink
	rec.exportWAV(createDownloadLink);
}

/* function createDownloadLink(blob) {

	var url = URL.createObjectURL(blob);
	var au = document.createElement('audio');
	var li = document.createElement('li');
	var link = document.createElement('a');

	//name of .wav file to use during upload and download (without extendion)
	var filename = new Date().toISOString();

	//add controls to the <audio> element
	au.controls = true;
	au.src = url;

	//save to disk link
	link.href = url;
	link.download = filename+".wav"; //download forces the browser to donwload the file using the  filename
	link.innerHTML = "Save to disk";

	//add the new audio element to li
	li.appendChild(au);

	//add the filename to the li
	li.appendChild(document.createTextNode(filename+".wav "))

	//add the save to disk link to li
	li.appendChild(link);

	//upload link
	var upload = document.createElement('a');
	upload.href="#";
	upload.innerHTML = "Upload";
	upload.addEventListener("click", function(event){
		  var xhr=new XMLHttpRequest();
		  xhr.onload=function(e) {
			  if(this.readyState === 4) {
				  console.log("Server returned: ",e.target.responseText);
			  }
		  };
		  var fd=new FormData();
		  fd.append("audio_data",blob, filename);
		  xhr.open("POST","upload.php",true);
		  xhr.send(fd);
	})
	li.appendChild(document.createTextNode (" "))//add a space in between
	li.appendChild(upload)//add the upload link to li

	//add the li element to the ol
	recordingsList.appendChild(li);
} */
var latestAudioBlob = null;
function stopAndClearPreview() {
	// Stop the media recorder and clear the preview
	if (mediaRecorder && mediaRecorder.state !== "inactive") {
		mediaRecorder.stop();
	}
	if (gumStream) {
		gumStream.getAudioTracks()[0].stop();
	}

	// If the latest audio blob exists, update the preview
	if (latestAudioBlob) {
		createDownloadLink(latestAudioBlob);
	}
}

function createDownloadLink(blob) {
	var url = URL.createObjectURL(blob);
	var filename = new Date().toISOString() + ".wav"; // Include the ".wav" extension in the filename

	// Store the audio blob in the global variable
	audioBlob = blob;

	// Declare the 'li' variable in the outer scope
	var li; // Declare the variable here

	// If the audio element and list item already exist, update their attributes
	if (audioElement && liElement) {
		audioElement.src = url;
		liElement.querySelector('a').href = url;
		liElement.querySelector('a').download = filename;
	} else {
		// Otherwise, create new audio element and list item
		audioElement = document.createElement('audio');
		audioElement.controls = true;
		audioElement.src = url;

		li = document.createElement('li'); // Assign the 'li' variable here
		li.classList.add('d-flex', 'justify-content-between');
		var link = document.createElement('a');
		link.href = url;
		link.download = filename;
		link.classList.add('btn', 'btn-primary', 'my-2');
		link.innerHTML = `<i class="bi bi-download"></i> Download `;

		li.appendChild(audioElement);
		// li.appendChild(document.createElement('br'));
		// li.appendChild(document.createTextNode(filename + " "));
		li.appendChild(link);

		var upload = document.createElement('a');
		upload.href = "#";
		// div.setAttribute("onclick", "deleteDoc(event)")

		upload.classList.add('btn', 'btn-info', 'my-2',);
		upload.innerHTML = `<i class="bi bi-paperclip"></i> Attached `;
		upload.addEventListener("click", function (event) {

			// Convert the audio blob to base64 string and store it in the hidden field
			var reader = new FileReader();
			reader.onloadend = function () {
				var base64_str = reader.result.split(",")[1];
				document.getElementById("audio_filename").value = filename; // Set the filename in the input field
				document.getElementById("audio_data").value = base64_str; // Set the audio data in the input field
			};
			reader.readAsDataURL(blob);

			let div = document.createElement("div")
			// div.setAttribute("download", "download")
			// div.setAttribute("href", `${fileName}`)

			div.setAttribute("class", "docName")
			div.setAttribute("id", `${filename}`)

		/* 	 div.innerHTML =
            `<div>audio-recording-file <span class='material-symbols-outlined' onclick=${deleteX(filename)}>cancel</span></div>`;
			document.getElementById('recd').append(div);

 */
            div.innerHTML =
            `<div> ${filename} </div> <span class="material-symbols-outlined" onclick="deleteXi('${filename}')">cancel</span>`
            document.getElementById('recd').append(div);
			upload.style.display = "none";

		});

		window.deleteXi = function(e) {
            console.log("X button clicked");
            document.getElementById("audio_filename").value = null;
            document.getElementById("audio_data").value = null;
            const elementToRemove = document.querySelector('#recordingsList');
            if (elementToRemove) {
                elementToRemove.remove();
            }
            console.log("Deleted!");
            document.getElementById(e).remove();
        }

		li.appendChild(document.createTextNode(" "));
		li.appendChild(upload);

		// Add the new li element to the ol
		var recordingsList = document.getElementById("recordingsList");
		recordingsList.innerHTML = ''; // Clear the list to only show the latest recording
		recordingsList.appendChild(li);
	}
}
