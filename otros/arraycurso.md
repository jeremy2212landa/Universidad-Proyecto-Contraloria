$curso = new CursosModel();
 $Data_C = array(
   'curso_id' => 31,
   'curso_nombre' => 'Migueliño curso',
   'curso_descripcion' => 'Le da culo a los tipos, en especial a gerardo',
   'curso_contralor' => 'Dañiel Monñon',
   'curso_fecha' => '2021-08-25'
 );

 $curso->update($Data_C);

echo "hola panfilo";