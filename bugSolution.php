```php
function processData(array $data): array
{
  $result = [];
  foreach ($data as $item) {
    if (is_array($item)) {
      $result[] = processData($item); // Recursive call for nested arrays
    } elseif (is_string($item) && filter_var($item, FILTER_VALIDATE_EMAIL)) {
      $result[] = explode('@', $item)[0]; //Extract before @ symbol ONLY if it's a valid email
    } else {
      $result[] = $item;
    }
  }
  return $result;
}

$data = ['test@example.com', 'another@test.com', 'user@domain.co.uk', 123, ['nested@email.com', 456], 'invalid@'];
$processedData = processData($data);
print_r($processedData);
```