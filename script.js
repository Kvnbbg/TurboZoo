document.getElementById('wormForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const metaverseData = document.getElementById('metaverseData').value;

    fetch('digital-worm.php', {
	method: 'POST',
	headers: {
	    'Content-Type': 'application/x-www-form-urlencoded',
	},
	body: 'metaverseData=' + encodeURIComponent(metaverseData),
    })
    .then(response => response.json())
    .then(data => {
	document.getElementById('cleanedData').textContent = 'Cleaned Metaverse Data: ' + data.cleanedData;
	document.getElementById('recycledMetadata').textContent = 'Recycled Metadata: ' + data.recycledMetadata.join(', ');
    })
    .catch(error => console.error('Error:', error));
});