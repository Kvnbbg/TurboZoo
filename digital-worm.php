<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate input data
    function sanitizeInput($data) {
        return htmlspecialchars(strip_tags(trim($data)));
    }

    // Function to locate the digital worm in the metaverse
    function locateWorm($data) {
        $pattern = '/\b(fear|anxiety|insecurity|doubt|stress|self-doubt)\b/i';
        preg_match_all($pattern, $data, $matches);
        return $matches[0];
    }

    // Function to extract and recycle the worm
    function extractAndRecycleWorm($data) {
        $wormData = locateWorm($data);

        // Remove the worm from the data
        $cleanData = preg_replace('/\b(fear|anxiety|insecurity|doubt|stress|self-doubt)\b/i', '', $data);

        // Convert worm data into recyclable metadata
        $recycledMetadata = array_map('strtoupper', $wormData);

        return [$cleanData, $recycledMetadata];
    }

    // Retrieve and sanitize metaverse data from POST request
    if (isset($_POST['metaverseData'])) {
        $metaverseData = sanitizeInput($_POST['metaverseData']);

        // Extract and recycle the worm
        list($cleanData, $recycledMetadata) = extractAndRecycleWorm($metaverseData);

        // Return results as JSON
        header('Content-Type: application/json');
        echo json_encode([
            'cleanedData' => $cleanData,
            'recycledMetadata' => $recycledMetadata
        ]);
    } else {
        // Handle missing metaverseData
        http_response_code(400);
        echo json_encode(['error' => 'metaverseData is required']);
    }
} else {
    // Handle invalid request method
    http_response_code(405);
    echo json_encode(['error' => 'Invalid request method']);
}
?>
