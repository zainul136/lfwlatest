$(document).ready(function() {
  $("#notification-menu").click(function(e) {
    e.preventDefault();
    $.ajax({
      url: "pendingRequests",
      method: "GET",
      success: function(response) {
        let html = '';
        response.forEach(function(request) {
          html += '<div class="r1 d-flex justify-content-between">';
          html += '  <div class="left d-flex">';
          html += '    <img src="/public/user_media/'+ request.id +'/profile_picture/' + request.profile_picture + '" alt="">';
          html += '    <div class="name">';
          html += '      <h2>' + request.first_name + ' ' + request.last_name + ' sent you a request </h2>';
          html += '      <p>' + request.email + '</p>';
          html += '      <div class="d-flex">';
          html += '        <button class="confirm-button" data-request-id= '+ request.id +'">Confirm</button>';
          html += '        <button class="confirm-button" data-request-id= '+ request.id +'">Delete</button>';
          html += '      </div>';
          html += '    </div>';
          html += '  </div>';
          html += '</div>';
        });
        
        $('.pendingRequests').html(html);  // Replace '.requests' with the class or ID of your container
      },
      error: function(error) {
        // Handle error
      }
    });
  });
});

$(window).on('load', function() {
  // Function to update the inner text of the notification menu
  function updateNotificationMenu(count) {
    if (count > 0) {
      $('#notification-menu-text').text('Notifications (' + count + ')');
    } else {
      $('#notification-menu-text').text('Notifications');
    }
  }

  // Perform the AJAX request
  $.ajax({
    url: "pendingRequests",
    method: "GET",
    success: function(response) {
      updateNotificationMenu(response.length);
    },
    error: function(error) {
      console.log(error)
    }
  });
});
