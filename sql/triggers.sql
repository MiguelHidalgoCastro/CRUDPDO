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

 ELSEIF (NEW.fechaInicioReto > NEW.fechaFinInscripcion)
    	THEN SIGNAL sqlstate '45001' set message_text = "FechaFinInscripcion > FechaInicioReto";

INSERT INTO `user2daw_BD1-06`.`retos` (`nombre`, `dirigido`, `descripcion`, `fechaInicioInscripcion`, `fechaFinInscripcion`, `fechaInicioReto`, `fechaFinReto`, `fechaPublicacion`, `idProfesor`, `idCategoria`) VALUES ('Prueba4', 'algo', 'nada', '2023-02-24', '2023-02-24', '2023-02-26 10:06:23', '2023-02-28 10:06:23', '2023-02-28 10:06:33', 3, 15);    
INSERT INTO `user2daw_BD1-06`.`retos` (`nombre`, `dirigido`, `fechaInicioInscripcion`, `fechaFinInscripcion`, `fechaInicioReto`, `fechaFinReto`, `fechaPublicacion`, `idProfesor`, `idCategoria`) VALUES ('Prueba1', 'algo', '2023-02-24', '2023-02-24', '2023-02-23 10:06:23', '2023-02-25 10:07:23', '2023-02-27 10:06:33', 3, 15);

NO SE PUEDE COMPARAR DATE CON UN TIMESTAMP en un trigger

DELIMITER $$

CREATE TRIGGER comprobar_f_inscripcionretos
BEFORE INSERT ON retos
FOR EACH ROW 
BEGIN
    SET fir = DATE(NEW.fechaInicioReto);
    IF (fir > NEW.fechaFinInscripcion) 
      THEN SIGNAL sqlstate '45001' set message_text = "FechaFinInscripcion > FechaInicioReto";
    END IF; 
END; $$

BEGIN
    SET @fir = cast(NEW.fechaInicioReto AS date);
    IF (@fir > NEW.fechaFinInscripcion) 
      THEN SIGNAL sqlstate '45001' set message_text = "FechaFinInscripcion > FechaInicioReto";
    END IF; 
END

BEGIN
  	DECLARE fechair DATETIME;
  	DECLARE tmp DATE;
  	SET fechair = NEW.fechaInicioReto;
  	SET tmp = DATE(fechair);
    IF (tmp > NEW.fechaFinInscripcion) THEN
	 	 SIGNAL sqlstate '45001' set message_text = "FechaFinInscripcion > FechaInicioReto";
    END IF; 
END