# PHP Data Processing Bug

This repository demonstrates a common bug in PHP data processing functions where an incorrect assumption about data format leads to unexpected results.

The `processData` function attempts to extract the username from email addresses but doesn't properly check for the correct email format, resulting in errors when encountering strings containing '@' that aren't actual email addresses.  This is demonstrated with a mixed array containing strings, integers and nested arrays.

## Bug Description
The core issue lies in the line `$result[] = explode('@', $item)[0];`.  This code assumes that any string containing '@' is an email address and extracts the part before the '@' symbol.  However, this is flawed; '@' might appear in other contexts, causing the function to incorrectly process data.

## Solution
The solution involves adding a more robust email validation check before processing strings containing '@'.  This ensures that only valid email addresses are handled correctly.
