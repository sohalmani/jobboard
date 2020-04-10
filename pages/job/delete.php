<?php
// This page will be called via AJAX, so we don't need any HTML
// Return error if accessed directly
if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) || strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
    exit;
}
