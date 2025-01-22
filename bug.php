```php
function processData(array $data): array
{
  $result = [];
  foreach ($data as $item) {
    if (is_array($item)) {
      $result[] = processData($item); // Recursive call for nested arrays
    } elseif (is_string($item) && strpos($item, '@') !== false) {
      //This line is problematic if there is an @ symbol that is NOT an email. 
      $result[] = explode('@', $item)[0]; //Extract before @ symbol assuming it's an email
    } else {
      $result[] = $item;
    }
  }
  return $result;
}

$data = ['test@example.com', 'another@test.com', 'user@domain.co.uk', 123, ['nested@email.com', 456]];
$processedData = processData($data);
print_r($processedData);
```