DELIMITER $$

CREATE TRIGGER comprobar_edad
BEFORE INSERT ON prueba
FOR EACH ROW 
BEGIN
    IF NEW.edad<18
      THEN SIGNAL sqlstate '45001' set message_text = "No way ! You cannot do this !";
    END IF; 
END; $$



DELIMITER $$

CREATE TRIGGER comprobar_fechas
BEFORE INSERT ON retos
FOR EACH ROW 
BEGIN
    IF (NEW.fechaInicioReto > NEW.fechaFinReto) 
      THEN SIGNAL sqlstate '45001' set message_text = "No way ! You cannot do this !";
    END IF; 
    IF (NEW.fechaInicioInscripcion > NEW.fechaFinInscripcion) 
      THEN SIGNAL sqlstate '45001' set message_text = "No way ! You cannot do this !";
    END IF; 
      IF (NEW.fechaInicioReto > NEW.fechaFinInscripcion) 
      THEN SIGNAL sqlstate '45001' set message_text = "No way ! You cannot do this !";
    END IF; 
END; $$


DELIMITER $$

CREATE TRIGGER comprobar_fechas
BEFORE INSERT ON retos
FOR EACH ROW 
BEGIN
    IF (NEW.fechaInicioReto > NEW.fechaFinReto) 
      THEN SIGNAL sqlstate '45001' set message_text = "No way ! You cannot do this !";
    ELSEIF (NEW.fechaInicioInscripcion > NEW.fechaFinInscripcion) 
      THEN SIGNAL sqlstate '45001' set message_text = "No way ! You cannot do this !";
    END IF; 
END; $$


ELSEIF (NEW.fechaInicioReto > NEW.fechaFinInscripcion) 
      THEN SIGNAL sqlstate '45001' set message_text = "No way ! You cannot do this !";



INSERT INTO `user2daw_BD1-06`.`retos` (`nombre`, `dirigido`, `descripcion`, `fechaInicioInscripcion`, `fechaFinInscripcion`, `fechaInicioReto`, `fechaFinReto`, `fechaPublicacion`, `idProfesor`, `idCategoria`) VALUES ('Prueba4', 'algo', 'nada', '2023-02-24', '2023-02-24', '2023-02-26 10:06:23', '2023-02-28 10:06:23', '2023-02-28 10:06:33', 3, 15);    