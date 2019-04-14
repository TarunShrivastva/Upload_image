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
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ URL::to('js/jquery.min.js') }}"></script>
    <script src="{{ URL::to('js/bootstrap.min.js') }}"></script>
    <script>
      function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
          tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
          tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
      }

      function statusUpdate(id,type,value,model){
        $.ajax({
            url: "{{ url('/statusUpdate') }}",
            method: 'get',
            data: {
               'id': id,
               'type': type,
               'value': value,
               'model': model 
            },
            success: function(result){
               if(result == 'update'){
                var data = (value==1)?'no':'yes';
                if(value==1){
                  value = '0';
                  $("#"+type+"_"+id).attr('class','btn btn-danger');
                }else{  
                  value ='1';
                  $("#"+type+"_"+id).attr('class','btn btn-success');
                }
                var func = 'statusUpdate("'+id+'","'+type+'",'+ value+',"'+model+'")';
                  $('#'+type+'_'+id).attr("onclick",func);
                  $("#"+type+"_"+id).html(data);

               }else{

               }
            }});
       } 
    </script>
  </body>
</html>
