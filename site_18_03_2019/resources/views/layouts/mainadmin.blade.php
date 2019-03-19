<!DOCTYPE html>
<html lang="en">
  @include('layouts.home_meta')
  <body>
  @include('layouts.nav')   
  @include('layouts.header')  
    <section id="breadcrumb">
      <div class="container">
        <ol class="breadcrumb">
          <li class="active">Dashboard</li>
        </ol>
      </div>
    </section>
    <!-- Add Page -->
  @yield('pageform')
  @include('flash-message')
  @include('layouts.sideinfo') 
        <footer id="footer">
      <p>Copyright Tarun, &copy; 2018</p>
    </footer>

    <!-- Modals -->

  <script>
     CKEDITOR.replace( 'editor1' );
 </script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{ URL::to('js/bootstrap.min.js') }}"></script>
  </body>
</html>
