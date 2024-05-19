<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Function to locate the digital worm in the metaverse
    function locateWorm($data) {
        $pattern = '/(fear|anxiety|insecurity|doubt|stress|self-doubt)/i';
        preg_match_all($pattern, $data, $matches);
        return $matches[0];
    }

    // Function to extract and recycle the worm
    function extractAndRecycleWorm($data) {
        $wormData = locateWorm($data);

        // Remove the worm from the data
        $cleanData = preg_replace('/(fear|anxiety|insecurity|doubt|stress|self-doubt)/i', '', $data);

        // Convert worm data into recyclable metadata
        $recycledMetadata = array_map('strtoupper', $wormData);

        return [$cleanData, $recycledMetadata];
    }

    // Retrieve metaverse data from POST request
    $metaverseData = $_POST['metaverseData'];

    // Extract and recycle the worm
    list($cleanData, $recycledMetadata) = extractAndRecycleWorm($metaverseData);

    // Return results as JSON
    echo json_encode([
        'cleanedData' => $cleanData,
        'recycledMetadata' => $recycledMetadata
    ]);
}
?>
