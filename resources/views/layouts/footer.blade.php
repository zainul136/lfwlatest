<footer>

<script src="{{ asset('storage/assets/js/relatives.js') }}"></script>
<!-- NAVBAR SEARCH ICON JS  -->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const confirmButtons = document.querySelectorAll('.confirm-button');
        const rejectButtons = document.querySelectorAll('.reject-button');

        confirmButtons.forEach(button => {
            button.addEventListener('click', function() {
                const requestId = button.getAttribute('data-request-id');
                updateStatus(requestId, 'approved')
                    .then(() => {
                        // Refresh the page once the request is confirmed
                        location.reload();
                    })
                    .catch(error => {
                        console.error('Error updating status:', error);
                    });
            });
        });

        rejectButtons.forEach(button => {
            button.addEventListener('click', function() {
                const requestId = button.getAttribute('data-request-id');
                updateStatus(requestId, 'rejected');
            });
        });

        function updateStatus(requestId, status) {
            return fetch(`/approveRequest/${requestId}`, {
                    method: 'PUT',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    }
                })
                .then(response => {
                    location.reload();
                })
                .catch(error => {
                    console.error('Error updating status:', error);
                });
        }
    });
</script>

{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        const confirmButtons = document.querySelectorAll('.confirm-button');
        const rejectButtons = document.querySelectorAll('.reject-button');

        confirmButtons.forEach(button => {
            button.addEventListener('click', function() {
                const card = document.querySelector('.request-card')
                console.log('Card:', card);
                const requestId = button.getAttribute('data-request-id');
                updateStatus(requestId, 'approved')
                    .then(() => {
                        console.log('Request approved successfully');
                        // Hide the card once the request is confirmed
                        card.style.display = 'none';
                    })
                    .catch(error => {
                        console.error('Error updating status:', error);
                    });
            });
        });

        rejectButtons.forEach(button => {
            button.addEventListener('click', function() {
                const requestId = button.getAttribute('data-request-id');
                updateStatus(requestId, 'rejected');
            });
        });

        function updateStatus(requestId, status) {
            return fetch(`/update-request-status/${requestId}`, {
                    method: 'PUT',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    }
                })
                .then(response => {
                    // Handle response here if needed
                })
                .catch(error => {
                    console.error('Error updating status:', error);
                });
        }
    });
</script>
--}}
<script>
const searchIconParent = document.querySelector(".searchIconParent");
const searchBar = document.querySelector(".searchBar");
const navLinksParent = document.querySelector(".main .header .navbar");
const navLinks = document.querySelectorAll(".main .header .navbar .nav-item");
const cancelBtn = document.querySelector(".cancelBtn");

// Applying event to that element
searchIconParent.addEventListener("click", function (e) {
  e.preventDefault();

  searchBar.setAttribute("style", "display:flex !important");
  // navLinksParent.style.overflowX = "hidden";
  navLinksParent.style.width = "auto";
  searchBar.style.visibility = "visible";
  for (let i = 0; i < navLinks.length; i++) {
    if (i !== navLinks.length - 1) {
      // navLinks[i].classList.remove("moveOrigin");
      // navLinks[i].classList.add("moveRight");
      navLinks[i].style.position = "absolute";
      navLinks[i].style.display = "none";
    }
  }
});

cancelBtn.addEventListener("click", function (e) {
  e.preventDefault();

  searchBar.setAttribute("style", "display:none !important");
  navLinksParent.style.width = "100%";
  searchBar.style.visibility = "hidden";
  for (let i = 0; i < navLinks.length; i++) {
    if (i !== navLinks.length - 1) {
      // navLinks[i].classList.remove("moveRight");
      // navLinks[i].classList.add("moveOrigin");
      navLinks[i].style.position = "unset";
      navLinks[i].style.display = "block";
    }
  }
});
    </script>
<script src="{{ asset('storage/assets') }}/js/jquery-3.3.1.min.js"></script>
<script src="{{ asset('storage/assets') }}/js/popper.min.js"></script>
<script src="{{ asset('storage/assets') }}/js/bootstrap.min.js"></script>
<script src="{{ asset('storage/assets') }}/js/main.js"></script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
</script>
<script>
    const OpenReqPage = () => {
        if (window.innerWidth <= 992) {
            window.location.href = "./MobileReqPage.html"
        } else {
            return
        }
    }


</script>
<!-- footer content goes here -->
</footer>
