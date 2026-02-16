# Test webhook script
$url = "http://127.0.0.1:8000/api/test-webhook"
$testData = @{
    "test" = "data"
    "transaction_id" = "test123"
    "status" = "completed"
} | ConvertTo-Json

Write-Host "Testing webhook at: $url"
Write-Host "Sending data: $testData"

try {
    $response = Invoke-RestMethod -Uri $url -Method POST -Body $testData -ContentType "application/json"
    Write-Host "Response received:"
    $response | ConvertTo-Json -Depth 3
} catch {
    Write-Host "Error occurred:"
    Write-Host $_.Exception.Message
    if ($_.Exception.Response) {
        Write-Host "Status Code:" $_.Exception.Response.StatusCode
    }
}
