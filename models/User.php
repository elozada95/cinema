<?php
require_once("../db/Database.php");
require_once("../interfaces/IUser.php");
class User implements IUser {
    private $con;
    private $id;
    private $date;
    private $start;
    private $finish;
    private $topic;
    private $dia;
    private $tipo;
    private $email;
    private $typeUser;
    private $name;
    private $password;
    private $surname;
    private $synopsis;
    private $release;
    private $duration;
    private $genere;
    private $rating;
    private $time;
    private $idmovie;
    private $room;
    public function __construct(Database $db){
        $this->con = new $db;
    }
    public function get(){
        
    }
    public function save(){
        
    }
    public function delete(){
        
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function setTime($time){
        $this->time = $time;
    }
    public function setRoom($room){
        $this->room = $room;
    }
    public function setIdmovie($idmovie){
        $this->idmovie = $idmovie;
    }
    public function setGenere($genere){
        $this->genere = $genere;
    }
    public function setDuration($duration){
        $this->duration = $duration;
    }
    public function setRating($rating){
        $this->rating = $rating;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function setSurname($surname){
        $this->surname = $surname;
    }
    public function setPassword($password){
        $this->password = $password;
    }
    public function setTypeUser($typeUser){
        $this->typeUser = $typeUser;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function setDia($dia)
    {
        $this->dia = $dia;
    }
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }
    public function setDate($date){
        $this->date = $date;
    }
    public function setStart($start){
        $this->start = $start;
    }
    public function setSynopsis($synopsis){
        $this->synopsis = $synopsis;
    }
    public function setRelease($synopsi){
        $this->synopsis = $synopsis;
    }
    //insertamos usuarios en una tabla con postgreSql

    public function saveUser() {
        try{
            //$new =('id from hours order by id desc LIMIT 1');
            //$new++;
            //$query =$this->con->prepare('INSERT INTO hours (id,day, professor,start,finish,type,period) values (10,"Friday",01326798,"19:00","20:00","officeHour",1');
            $query = $this->con->prepare('INSERT INTO usuar (name,surname,email, password,type) VALUES (?,?,?,?,1)');
            //$query->bindParam(1,$new);
            $query->bindParam(1, $this->name, PDO::PARAM_STR);
            $query->bindParam(2, $this->surname, PDO::PARAM_STR);
            $query->bindParam(3, $this->email, PDO::PARAM_STR);
            $query->bindParam(4, $this->password, PDO::PARAM_STR);
            $query->execute();
            $this->con->close();
            
        }
        catch(PDOException $e) {
            echo  $e->getMessage();
        }
    }
    public function saveMovie() {
        try{
            //$new =('id from hours order by id desc LIMIT 1');
            //$new++;
            //$query =$this->con->prepare('INSERT INTO hours (id,day, professor,start,finish,type,period) values (10,"Friday",01326798,"19:00","20:00","officeHour",1');
            $query = $this->con->prepare('INSERT INTO movie(name, synopsis, releasedate, duration, gen, rating) VALUES (?,?,?,?,?,?)');
            //$query->bindParam(1,$new);
            $query->bindParam(1, $this->name, PDO::PARAM_STR);
            $query->bindParam(2, $this->synopsis, PDO::PARAM_STR);
            $query->bindParam(3, $this->date, PDO::PARAM_STR);
            $query->bindParam(4, $this->duration, PDO::PARAM_STR);
            $query->bindParam(5, $this->genere, PDO::PARAM_STR);
            $query->bindParam(6, $this->rating, PDO::PARAM_STR);
            $query->execute();
            $this->con->close();
            
        }
        catch(PDOException $e) {
            echo  $e->getMessage();
        }
    }
    public function saveScreening() {
        try{
            //$new =('id from hours order by id desc LIMIT 1');
            //$new++;
            //$query =$this->con->prepare('INSERT INTO hours (id,day, professor,start,finish,type,period) values (10,"Friday",01326798,"19:00","20:00","officeHour",1');
            $query = $this->con->prepare('INSERT INTO screening(idmovie, idroom, sdate, stime) VALUES (?,?,?,?)');
            //$query->bindParam(1,$new);
            $query->bindParam(1, $this->idmovie, PDO::PARAM_STR);
            $query->bindParam(2, $this->room, PDO::PARAM_STR);
            $query->bindParam(3, $this->date, PDO::PARAM_STR);
            $query->bindParam(4, $this->time, PDO::PARAM_STR);
            $query->execute();
            $this->con->close();
            
        }
        catch(PDOException $e) {
            echo  $e->getMessage();
        }
    }
    public function updateUser() {
        try{
            //$new =('id from hours order by id desc LIMIT 1');
            //$new++;
            //$query =$this->con->prepare('INSERT INTO hours (id,day, professor,start,finish,type,period) values (10,"Friday",01326798,"19:00","20:00","officeHour",1');
            $query = $this->con->prepare('UPDATE usuar SET email = ?,name = ?,surname = ? WHERE id = ?');
            //$query->bindParam(1,$new);
            $query->bindParam(1, $this->email, PDO::PARAM_STR);
            $query->bindParam(2, $this->name, PDO::PARAM_STR);
            $query->bindParam(3, $this->surname, PDO::PARAM_STR);
            $query->bindParam(4, $this->id, PDO::PARAM_INT);
            $query->execute();
            $this->con->close();
        }
        catch(PDOException $e) {
            echo  $e->getMessage();
        }
    }
    public function updatePassword() {
        try{
            //$new =('id from hours order by id desc LIMIT 1');
            //$new++;
            //$query =$this->con->prepare('INSERT INTO hours (id,day, professor,start,finish,type,period) values (10,"Friday",01326798,"19:00","20:00","officeHour",1');
            $query = $this->con->prepare('UPDATE usuar SET password = ? WHERE id = ?');
            //$query->bindParam(1,$new);
            $query->bindParam(1, $this->password, PDO::PARAM_STR);
            $query->bindParam(2, $this->id, PDO::PARAM_INT);
            $query->execute();
            $this->con->close();
        }
        catch(PDOException $e) {
            echo  $e->getMessage();
        }
    }
    public function saveAppointment() {
        try{
            $query = $this->con->prepare('INSERT INTO asesorias (student, professor, topic, dateh, start, finish) values (?, ?, ?, ?, ?, ?)');
            $query->bindParam(1, $this->id, PDO::PARAM_STR);
            $query->bindParam(2, $this->professor, PDO::PARAM_STR);
            $query->bindParam(3, $this->topic, PDO::PARAM_STR);
            $query->bindParam(4, $this->date, PDO::PARAM_STR);
            $query->bindParam(5, $this->start, PDO::PARAM_STR);
            $query->bindParam(6, $this->finish, PDO::PARAM_STR);
            $query->execute();
            $this->con->close(); 
        }
        catch(PDOException $e) {
            echo  $e->getMessage();
        }
    }
    public function update(){
        try{
            $query = $this->con->prepare('UPDATE users SET username = ?, password = ? WHERE id = ?');
            $query->bindParam(1, $this->username, PDO::PARAM_STR);
            $query->bindParam(2, $this->password, PDO::PARAM_STR);
            $query->bindParam(3, $this->id, PDO::PARAM_INT);
            $query->execute();
            $this->con->close();
        }
        catch(PDOException $e){
            echo  $e->getMessage();
        }
    }
    //obtenemos usuarios de una tabla con postgreSql
    public function viewReservations(){
        try{
            if(!empty($this->id)){
                $query = $this->con->prepare('select idscreening,seatnumber from ticket where iduser = ?');
                $query->bindParam(1, $this->id, PDO::PARAM_INT);
                $query->execute();
                $this->con->close();
                return $query->fetchAll(PDO::FETCH_OBJ);
            }
        }
        catch(PDOException $e){
            echo  $e->getMessage();
        }
    }
    public function viewStudent(){
        try{
            if(!empty($this->id)){
                $query = $this->con->prepare('select hours.professor as "Profesor",(date)date,hours.start,hours.finish,topic from availabledates,hours where officehour = hours.id and student = ?');
                $query->bindParam(1, $this->id, PDO::PARAM_INT);
                $query->execute();
                $this->con->close();
                return $query->fetchAll(PDO::FETCH_OBJ);
            }
            else{
                $query = $this->con->prepare('SELECT * FROM student');
                $query->execute();
                $this->con->close();
                return $query->fetchAll(PDO::FETCH_OBJ);
            }
        }
        catch(PDOException $e){
            echo  $e->getMessage();
        }
    }
    public function viewMovie(){
        try{
                $query = $this->con->prepare('select name,synopsis,releasedate,duration,gen,rating from movie where id = ?');
                $query->bindParam(1, $this->id, PDO::PARAM_INT);
                $query->execute();
                $this->con->close();
                return $query->fetchAll(PDO::FETCH_OBJ);
            
        }
        catch(PDOException $e){
            echo  $e->getMessage();
        }
    }
    public function viewProfessor(){
        try{
            if(!empty($this->id)){
                $query = $this->con->prepare('select availabledates.student,availabledates.date,start,finish,availabledates.topic from hours,availabledates where availabledates.officehour = hours.id and professor = ?');
                $query->bindParam(1, $this->id, PDO::PARAM_INT);
                $query->execute();
                $this->con->close();
                return $query->fetchAll(PDO::FETCH_OBJ);
            }
            else{
                $query = $this->con->prepare('SELECT * FROM student ');
                $query->execute();
                $this->con->close();
                return $query->fetchAll(PDO::FETCH_OBJ);
            }
        }
        catch(PDOException $e){
            echo  $e->getMessage();
        }
    }
    public function viewHours(){
        try{
            if(!empty($this->id)){
                $query = $this->con->prepare('select id,day,start,finish,type from hours where professor = ?');
                $query->bindParam(1, $this->id, PDO::PARAM_INT);
                $query->execute();
                $this->con->close();
                return $query->fetchAll(PDO::FETCH_OBJ);
            }
            else{
                $query = $this->con->prepare('SELECT * FROM student ');
                $query->execute();
                $this->con->close();
                return $query->fetchAll(PDO::FETCH_OBJ);
            }
        }
        catch(PDOException $e){
            echo  $e->getMessage();
        }
    }
    public function viewAppointments(){
        try{
            if(!empty($this->professor)){
                $query = $this->con->prepare('select student, topic, dateh, start, finish from asesorias where professor = ? order by dateh');
                $query->bindParam(1, $this->professor, PDO::PARAM_INT);
                $query->execute();
                $this->con->close();
                return $query->fetchAll(PDO::FETCH_OBJ);
            }
        }
        catch(PDOException $e){
            echo  $e->getMessage();
        }
    }
    public function viewAppointmentsSt(){
        try{
            if(!empty($this->id)){
                $query = $this->con->prepare('select professor, topic, dateh, start, finish from asesorias where student = ? order by dateh');
                $query->bindParam(1, $this->id, PDO::PARAM_INT);
                $query->execute();
                $this->con->close();
                return $query->fetchAll(PDO::FETCH_OBJ);
            }
        }
        catch(PDOException $e){
            echo  $e->getMessage();
        }
    }
    public function viewAppointmentsWeek(){
        try{
            if(!empty($this->professor)){
                $query = $this->con->prepare('select student, topic, dateh, start, finish from asesorias where professor = ? and extract(week from now()) = extract(week from dateh) order by dateh');
                $query->bindParam(1, $this->professor, PDO::PARAM_INT);
                $query->execute();
                $this->con->close();
                return $query->fetchAll(PDO::FETCH_OBJ);
            }
        }
        catch(PDOException $e){
            echo  $e->getMessage();
        }
    }
    public function viewAppointmentsMonth(){
        try{
            if(!empty($this->professor)){
                $query = $this->con->prepare('select student, topic, dateh, start, finish from asesorias where professor = ? and extract(month from now()) = extract(month from dateh) order by dateh');
                $query->bindParam(1, $this->professor, PDO::PARAM_INT);
                $query->execute();
                $this->con->close();
                return $query->fetchAll(PDO::FETCH_OBJ);
            }
        }
        catch(PDOException $e){
            echo  $e->getMessage();
        }
    }
    public function getMovie(){
        try{
            if(is_int($this->id)){
                $query = $this->con->prepare('SELECT id,name FROM movie');
                //$query->bindParam(1, $this->id, PDO::PARAM_INT);
                $query->execute();
                $this->con->close();
                return $query->fetch(PDO::FETCH_OBJ);
            }
            else{
                $query = $this->con->prepare('SELECT * FROM movie');
                $query->execute();
                $this->con->close();
                return $query->fetchAll(PDO::FETCH_OBJ);
            }
        }
        catch(PDOException $e){
            echo  $e->getMessage();
        }
    }
    public function getScreening(){
        try{
            if(is_int($this->id)){
                $query = $this->con->prepare('SELECT screening.id, movie.name, movie.rating, screening.idroom, room.type, room.price, screening.sdate, screening.stime, screening.isfull FROM screening, movie, room WHERE screening.idmovie = movie.id AND screening.idroom = room.id ORDER BY sdate, stime');
                //$query->bindParam(1, $this->id, PDO::PARAM_INT);
                $query->execute();
                $this->con->close();
                return $query->fetch(PDO::FETCH_OBJ);
            }
            else{
                $query = $this->con->prepare('SELECT screening.id, movie.name, movie.rating, screening.idroom, room.type, room.price, screening.sdate, screening.stime, screening.isfull FROM screening, movie, room WHERE screening.idmovie = movie.id AND screening.idroom = room.id ORDER BY sdate, stime');
                $query->execute();
                $this->con->close();
                return $query->fetchAll(PDO::FETCH_OBJ);
            }
        }
        catch(PDOException $e){
            echo  $e->getMessage();
        }
    }
    public function getUsuario(){
        try{
                $query = $this->con->prepare('SELECT * FROM usuar order by id asc ');
                //$query->bindParam(1, $this->id, PDO::PARAM_INT);
                $query->execute();
                $this->con->close();
                return $query->fetchAll(PDO::FETCH_OBJ);
        }
        catch(PDOException $e){
            echo  $e->getMessage();
        }
    }

    public function getSinAdmin(){
        try{
                $query = $this->con->prepare('SELECT * FROM usuar where id > 0 order by id asc');
                //$query->bindParam(1, $this->id, PDO::PARAM_INT);
                $query->execute();
                $this->con->close();
                return $query->fetchAll(PDO::FETCH_OBJ);
        }
        catch(PDOException $e){
            echo  $e->getMessage();
        }
    }

     public function deleteUsuario(){
        try{
            $query = $this->con->prepare('DELETE FROM usuar WHERE id = ?');
            $query->bindParam(1, $this->id, PDO::PARAM_INT);
            $query->execute();
            $this->con->close();
            return true;
        }
        catch(PDOException $e){
            echo  $e->getMessage();
        }
    }
    public function deleteMovie(){
        try{
            $query = $this->con->prepare('DELETE FROM movie WHERE id = ?');
            $query->bindParam(1, $this->id, PDO::PARAM_INT);
            $query->execute();
            $this->con->close();
            return true;
        }
        catch(PDOException $e){
            echo  $e->getMessage();
        }
    }
    public function deleteScreening(){
        try{
            $query = $this->con->prepare('DELETE FROM screening WHERE id = ?');
            $query->bindParam(1, $this->id, PDO::PARAM_INT);
            $query->execute();
            $this->con->close();
            return true;
        }
        catch(PDOException $e){
            echo  $e->getMessage();
        }
    }
    public static function baseurl() {
         return stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://' : 'http://' . $_SERVER['HTTP_HOST'] . "/cinema/";
    }
    public function checkUser($user) {
        if( !$user ) {
            header("Location:" . User::baseurl() . "app/list.php");
        }
    }
}
?>