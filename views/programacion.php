
<!-- titulo de la aplicacion y miga de pan  -->
<section class="content-header">
   <div class="container-fluid">
     <div class="row mb-2">
       <div class="col-sm-6">
         <h1>Programación <i class="fas fa-clock"></i></h1>
       </div>
       <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
           <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
           <li class="breadcrumb-item active">Programación</li>
         </ol>
       </div>
     </div>
   </div>
 </section>
 <!-- /. titulo de la aplicacion y miga de pan  -->

 <!-- ubicación de tablas y formularios -->
 <section class="content">
   <div class="container-fluid">
     <div class="row">
       <div class="col-12">
         <div class="card">

           <!-- card-header -->
           <div class="card-header">
             <button class="btn btn-danger text-right" data-toggle="modal" data-target="#modal-danger">Programación <i class="fas fa-plus"></i></button>
           </div>
           <!-- /.card-header -->

           <!-- card body -->
           <div class="card-body">
             <table id="example1" class="table table-striped">
               <thead>
               <tr>
                 <th class="text-center" width="10px">#</th>
                 <th class="text-center">Nombre(s)</th>
                 <th class="text-center">Estado</th>
                 <th class="text-center">Usuario</th>
                 <th class="text-center">Curso</th>
                 <th class="text-center">Periodo</th>
                 <th class="text-center">Asignatura</th>
                 <th class="text-center">Fecha de programación</th>
                 <th class="text-center">Hora de programación</th>
                 <th class="text-center">Acciones</th>
               </tr>
               </thead>
               <tbody>


                <?php  

                $programming = ProgrammingController::ctrListarProgramacion();

                foreach($programming as $value) {
                  
                  echo "<tr>";
                  echo '<td class="text-center">'.$value["id_programacion"].'</td>';
                  echo '<td class="text-center">'.$value["nombreP"].'</td>';
                  echo '<td class="text-center">'.$value["estado"].'</td>';
                  echo '<td class="text-center">'.$value["nombreU"].'</td>';
                  echo '<td class="text-center">'.$value["n_curso"].'</td>';
                  echo '<td class="text-center">'.$value["nombrePe"].'</td>';
                  echo '<td class="text-center">'.$value["nombreS"].'</td>';
                  echo '<td class="text-center">'.$value["fecha_programación"].'</td>';
                  echo '<td class="text-center">'.$value["hora_programacion"].'</td>';
                  echo '<td class="text-center">

                  <button type="button" class="btn-xs btn-info" data-toggle="modal" data-target="#modal-editar"> <i class="fas fa-edit"></i></button>

                  <button type="button" class="btn-xs btn-danger" idProgramacion="'.$value["id_programacion"].'"> <i class="fas fa-lock"></i></button></td>';
                  echo "</tr>";


                }

                ?>


               </tbody>
               <tfoot>
               <tr>
                 <th class="text-center" width="10px">#</th>
                 <th class="text-center">Nombre(s)</th>
                 <th class="text-center">Estado</th>
                 <th class="text-center">Usuario</th>
                 <th class="text-center">Curso</th>
                 <th class="text-center">Periodo</th>
                 <th class="text-center">Asignatura</th>
                 <th class="text-center">Fecha de programación</th>
                 <th class="text-center">Hora de programación</th>
                 <th class="text-center">Acciones</th>
               </tr>
               </tfoot>
             </table>
           </div>
           <!-- /.card body -->

           <!-- card footer -->
           <div class="card-footer">

           </div>
           <!-- /. card footer -->


         </div>

       </div>
     </div>
   </div>


    <!-- CALENDARIO -->
    <div class="col-12">
     <div class="card card-outline card-warning+">
       <div class="card-header">
         <h3 class="card-title">Calendario</h3>

         <div class="card-tools">
           <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
             <i class="fas fa-minus"></i>
           </button>

         </div>
       </div>

       <div class="card-body">

         <div class="row">
           <div class="col-lg-3 col-6">

             <div id="calendar" style="width: 1200px;"></div>

         </div>
       </div>

     </div>
   </div>
   <!-- CALENDARIO -->

   </div>


 </section>
 <!-- /. ubicación de tablas y formularios -->


 <!-- modal de nuevo registro -->
 <div class="modal fade" id="modal-danger">
   <div class="modal-dialog">
     <div class="modal-content">

       <div class="modal-header bg-primary">
         <h4 class="modal-title">Programación <i class="fas fa-clock"></i></h3>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true" class="text-white">&times;</span>
         </button>
       </div>

       <form action="" class="validar" method="post">

          <div class="modal-body">


           <div class="form-row">
             <div class="form-group col-md-6">
               <label for="nombre">Nombre <span class="text-danger">*</span></label>
               <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Digíte su nombre completo">

               <input type="hidden" value="Activo" name="estado" id="estado">
             </div>
             <div class="form-group col-md-6">
             
               <label for="surname">Usuario <span class="text-danger">*</span></label>

               <select name="id_usuario" id="id_usuario" class="form-control">

                <option value="" class="form-control">Seleccione..</option>

                <?php 

                $user = UserController::ctrListarUsuario();

                foreach ($user as $value) {

                  echo '<option value="'.$value["id_usuario"].'">'.$value["n_documento"].'-'.$value["nombreUsuario"].' '.$value["apellido"].'</option>';
                  

                } ?>

               </select>

             </div>
           </div>

           <div class="form-row">
             <div class="form-group col-md-6">
               <label for="typeDocument">Curso <span class="text-danger">*</span></label>

               <select class="form-control" name="id_curso" id="id_curso">

                <option value="" class="form-control">Seleccione..</option>

                <?php 
                 
                 $grade = GradeController::ctrListarCurso();

                 foreach ($grade as $key => $value) {
                   
                   echo '<option value="'.$value["id_curso"].'">'.$value["n_curso"].'</option>';
                 }



                 ?>
      
               </select>
             </div>


             <div class="form-group col-md-6">
               <label for="id_periodo">Periodo <span class="text-danger">*</span></label>
               
               <select name="id_periodo" id="id_periodo" class="form-control">

                <option value="" class="form-control">Seleccione..</option>
                 
                 <?php 

                   $period = PeriodController::ctrListarPeriodo();
                   
                   foreach ($period as $key => $value) {
                     
                     echo '<option value="'.$value["id_periodo"].'">'.$value["nombre"].'</option>';
                   }


                  ?>
               </select>
             </div>
           </div>

           <div class="form-row">
             <div class="form-group col-md-6">
               <label for="birthdate">Asignatura <span class="text-danger">*</span></label>
               
               <select name="id_asignatura" id="id_asignatura" class="form-control">

                <option value="">Seleccione..</option>
                 

                 <?php 

                 $subject = SubjectController::ctrListarAsignatura();


                 foreach ($subject as $key => $value) {

                    
                    echo '<option value="'.$value["id_asignatura"].'">'.$value["nombre"].'</option>';
                 }



                  ?>
               </select>
             </div>
             <div class="form-group col-md-6">
               <label for="email">Fecha de programación <span class="text-danger">*</span></label>
               <input type="date" class="form-control" name="fecha_programacion" id="fecha_programacion" placeholder="Digíte la fecha">
             </div>
           </div>


           <div class="form-row">
             <div class="form-group col-md-6">
               <label for="email">Hora de programación <span class="text-danger">*</span></label>
               <input type="time" class="form-control" name="hora_programacion" id="hora_programacion" placeholder="Digíte la fecha">
             </div>
           </div>


          </div>

          <div class="modal-footer pull-right">
            <button type="reset" class="btn btn-outline-secondary">Limpiar <i class="fas fa-backspace"></i></button>
           <button type="submit" class="btn btn-success">Guardar <i class="fas fa-save"></i></button>
         </div>



         <?php 


             $programar = new ProgrammingController();

             $programar-> newProgramming();


          ?>

     </form>

     </div>
   </div>
 </div>
 <!-- /. modal de nuevo registro -->





 <!-- FULL CALENDAR -->
 
 <script>


 document.addEventListener('DOMContentLoaded', function() {
     var calendarEl = document.getElementById('calendar');

     var colores = ['#f56954', '#f39c12', '#0073b7', '#00c0ef', '#00a65a', '#3c8dbc'];

     var calendar = new FullCalendar.Calendar(calendarEl, {
       timeZone: 'UTC',
       themeSystem: 'bootstrap',
       headerToolbar: {
         left: 'prev,next today',
         center: 'title',
         right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
       },
       buttonText: {
         today: 'hoy',
         month: 'mes',
         week : 'semana',
         day  : 'día',
         list: 'lista'
       },
       weekNumbers: true,
       dayMaxEvents: true,

       events: [

       <?php 


         $programming = ProgrammingController::ctrListarProgramacion();

         foreach($programming as $value) {

          echo '


             {
               title: "'.$value["nombreP"].'",
               start: "'.$value["fecha_programación"].' '.$value["hora_programacion"].'",
               backgroundColor: "#f56954"
             },



          ';
           
           

         }


        ?>


     ]

     });

     calendar.render();
   });


 </script>
 
 <!-- /. FULL CALENDAR -->


