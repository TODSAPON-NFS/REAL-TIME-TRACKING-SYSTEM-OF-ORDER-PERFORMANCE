<!DOCTYPE html>
<html>
  <head>
    {{--Every child page should inject page title through section name title--}}
    @include('partials.MainPartials._head')
    @yield('OuterInclude')
  </head>

  <body>
      <hr>
      @include('partials.MainPartials._navigation')
      <div id="ContentOfBody" class="container-fluid">
         @yield('ContentOfBody')
      </div>

  </body>
 
</html>
