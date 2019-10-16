<!DOCTYPE html>
<html>
<!--              -------Creado por-------               -->
<!--             \(x.x )/ Anarchy \( x.x)/               -->
<!--              ------------------------               -->

<!--//    Bastará decir que soy Juan Pablo Castel, el pintor que mató a María Iribarne...  \\                  -->
       <!-- Sweet Alert -->
    <link href="css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
    
      <div>
          <div class="panel panel-default">
              <div align=center class="panel-heading"><h3 class="panel-title">Registrar clientes</h3></div>
              <div align=center class="panel-body">
                  <form role="form" id="ClientesInsert">
                 
                      <div class="form-group">
                          <label for="Inputnombres">nombres</label>
                          <input type="text" name="nombres" class="form-control" id="Inputnombres" placeholder="nombres">
                       </div>
                      <div class="form-group">
                          <label for="Inputapellidos">apellidos</label>
                          <input type="text" name="apellidos" class="form-control" id="Inputapellidos" placeholder="apellidos">
                       </div>
                      <div class="form-group">
                          <label for="Inputcedula">cedula</label>
                          <input type="text" name="cedula" class="form-control" id="Inputcedula" placeholder="cedula">
                       </div>
                      <div class="form-group">
                          <label for="Inputedad">edad</label>
                          <input type="text" name="edad" class="form-control" id="Inputedad" placeholder="edad">
                       </div>
                      <div class="form-group">
                          <label for="Inputcorreo">correo</label>
                          <input type="text" name="correo" class="form-control" id="Inputcorreo" placeholder="correo">
                       </div>
                      <div class="form-group">
                          <label for="Inputtelefono">telefono</label>
                          <input type="text" name="telefono" class="form-control" id="Inputtelefono" placeholder="telefono">
                       </div>
                      <div class="form-group">
                          <label for="Inputfecha_nacimiento">fecha_nacimiento</label>
                          <input type="date" name="fecha_nacimiento" class="form-control" id="Inputfecha_nacimiento" placeholder="fecha_nacimiento">
                       </div>
              <button type="button" class="btn btn-primary" onclick="registraraCliente()">Registrar</button>
                   </form>
               </div><!-- panel-body -->
          </div> <!-- panel -->
      </div>


             <!-- Sweet alert -->
    <script src="js/plugins/sweetalert/sweetalert.min.js"></script>

  <script>
   
    
    function registraraCliente(){
      
  
        var url1 = "../back/controller/Clientes_Registrar.php";
        
    console.log($("#ClientesInsert").serialize());
      
    //  echo jason_encode('error');
    
        $.ajax({                        
           type: "POST",                 
           url: url1,                     
           data: $("#ClientesInsert").serialize(), 
       
                 
           success: function(data){
     
        //   console.log('rpta'+data);
            // alert(data);
               
               if(data==1){
                   
        
                   
              aceptarPersona();
           
               }if (data==2){
                   errorPersonaCampos();
               }else{
                  //errorPersona();
                  errorPersonaInsert
               }
                          
           }
       });
   
};

     function aceptarPersona(){
  

       swal({
                        title: "Registro",
                        text: "Registro Exitoso!",
                        type: "success",
                       // showCancelButton: true,
                        confirmButtonColor: "#1ab394",
                        confirmButtonText: "Ok",
                       // cancelButtonText: "No, cancel plx!",
                      //   closeOnConfirm: false,
                        closeOnCancel: false },
                    function (isConfirm) {
                        if (isConfirm) {
                   
                      Clientes_Listar();
                  
                        } 
                        else {
                            swal("Cancelled", "Your imaginary file is safe :)", "error");
                        }
                    });
   
};


     function errorPersonaCampos(){
  

       swal({
                        title: "Error",
                        text: "Complete los Campos!",
                        type: "error",
                       // showCancelButton: true,
                        confirmButtonColor: "#dd6b55",
                        confirmButtonText: "Ok",
                       // cancelButtonText: "No, cancel plx!",
                      //   closeOnConfirm: false,
                        closeOnCancel: false },
                    function (isConfirm) {
                        if (isConfirm) {
                          // alert('mySelect2'+mySelect2);
                        //  console.log("mySelect2");
                    //  Persona_Listar();
                     //  swal("Deleted!", "Your imaginary file has been deleted.", "success");
                        } 
                        else {
                            swal("Cancelled", "Your imaginary file is safe :)", "error");
                        }
                    });
   
};

  function errorPersonaInsert(){
  

       swal({
                        title: "Error",
                        text: "No se Pudo Registrar!",
                        type: "error",
                       // showCancelButton: true,
                        confirmButtonColor: "#dd6b55",
                        confirmButtonText: "Ok",
                       // cancelButtonText: "No, cancel plx!",
                      //   closeOnConfirm: false,
                        closeOnCancel: false },
                    function (isConfirm) {
                        if (isConfirm) {
                          // alert('mySelect2'+mySelect2);
                        //  console.log("mySelect2");
                    //  Persona_Listar();
                     //  swal("Deleted!", "Your imaginary file has been deleted.", "success");
                        } 
                        else {
                            swal("Cancelled", "Your imaginary file is safe :)", "error");
                        }
                    });
   
};
</script>
<!-- That`s all folks! -->
</html>