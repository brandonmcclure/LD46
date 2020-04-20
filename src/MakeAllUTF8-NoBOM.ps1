$files = Get-ChildItem (Split-Path $PSCommandPath -Parent) -Recurse | where {$_.Extension -eq ".php"}
foreach ($file in $files){
 $c = Get-Content $file.FullName 
 $Utf8NoBomEncoding = New-Object System.Text.UTF8Encoding $False
 [System.IO.File]::WriteAllLines($file.FullName, $c, $Utf8NoBomEncoding)
 }