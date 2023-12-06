/* // collect DOMs
const display = document.querySelector('.voice')
const btn = document.getElementById("voice")
const voiceinput =  document.getElementById("UploadImages")
const docsBtn = document.getElementById("docBtn")
const tagBtn = document.getElementById("tagsBtn")
const State = ['Initial', 'Record', 'Download']
let stateIndex = 0
let mediaRecorder, chunks = [], audioURL = ''

// mediaRecorder setup for audio
if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia){
    console.log('mediaDevices supported..')

    navigator.mediaDevices.getUserMedia({
        audio: true
    }).then(stream => {
        mediaRecorder = new MediaRecorder(stream)

        mediaRecorder.ondataavailable = (e) => {
            chunks.push(e.data)
        }

        mediaRecorder.onstop = () => {
            const blob = new Blob(chunks, {'type': 'audio/ogg; codecs=opus'})
            chunks = []
            audioURL = window.URL.createObjectURL(blob)
            document.querySelector('audio').src = audioURL

        }
    }).catch(error => {
        console.log('Following error has occured : ',error)
    })
}else{
    stateIndex = ''
    application(stateIndex)
}

// application(stateIndex)

let Recordaudio = false

btn.addEventListener("click", ()=>{
Recordaudio = !Recordaudio

if(Recordaudio){
    mediaRecorder.start()
    console.log("recording")
    display.textContent = 'Recording...'

}else{
    mediaRecorder.stop()
    display.textContent = ''
    const audio = document.createElement('audio')
    audio.controls = true
    audio.src = audioURL
    display.append(audio)
    voiceinput.disabled = true
    docsBtn.disabled = true
}
})
 */
