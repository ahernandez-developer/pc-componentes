<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
  <!-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> -->

  <!-- Ziggy library, make Laravel routes available in js files -->
 
   <!-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">   -->
 
  <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />
  <script src="{{ mix('/js/app.js') }}" defer></script>
</head>

<body>
  @routes
  @inertia
</body>

</html>