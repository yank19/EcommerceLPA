


// about us


function initMap() {
  var location = {lat: -27.4698, lng: 153.0251};

  var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 10,
      center: location
  });

  var marker = new google.maps.marker.AdvancedMarkerElement({
      position: location,
      map: map
  });
}

function loadYouTubeVideo() {
  var videoId = 'imE-RdABhDw'; // Example video ID
  var iframe = document.createElement('iframe');
  iframe.src = 'https://www.youtube.com/watch?v=' + videoId;
  iframe.frameBorder = '0';
  iframe.allow = 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture';
  iframe.allowFullscreen = true;
  document.getElementById('youtube-video').appendChild(iframe);
}

function loadTwitterProfile() {
  var profileURL = 'https://x.com/Australia'; // Example profile URL
  var iframe = document.createElement('iframe');
  iframe.src = profileURL;
  iframe.height = '500';
  iframe.style.border = 'none';
  iframe.scrolling = 'no';
  iframe.frameBorder = '0';
  iframe.allow = 'encrypted-media';
  document.getElementById('twitter-profile').appendChild(iframe);
}

window.onload = function() {
  initMap();
  loadYouTubeVideo();
  loadTwitterProfile();
};
