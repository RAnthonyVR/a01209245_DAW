--Ricardo Antonio Vázquez Rodríguez A01209245
--Laboratorio 24 TRANSACCIONES
CREATE TABLE ClientesBanca (
  NoCuenta VARCHAR(5) PRIMARY KEY,
  Nombre VARCHAR(30) NOT NULL,
  Saldo NUMERIC(10,2) NOT NULL
)

CREATE TABLE Realizan (
  NoCuenta VARCHAR(5) NOT NULL,
  ClaveM VARCHAR(2) not null,
  Fecha DATETIME NOT NULL,
  Monto NUMERIC(10,2) NOT NULL,

CONSTRAINT fkNoCuenta FOREIGN KEY (NoCuenta)
  REFERENCES ClientesBanca (NoCuenta),

CONSTRAINT fkClaveM FOREIGN KEY (ClaveM)
  REFERENCES TiposMovimiento(ClaveM),

  constraint pkrealizan PRIMARY KEY (NoCuenta,ClaveM,Fecha)
)

DROP TABLE Realizan

CREATE TABLE TiposMovimiento (

ClaveM VARCHAR(2) PRIMARY KEY,
Descripcion VARCHAR(30) NOT NULL
)


ALTER TABLE Realizan
ADD CONSTRAINT NoCuentaClaveM PRIMARY KEY (Fecha,Monto);

/*
NoCuenta
varchar(5)
Nombre
varchar(30)
Saldo
numeric(10,2)
Fecha
datetime
Monto
numeric(10,2)
ClaveM
varchar(2)
Descripcion
varchar(30)
*/

INSERT INTO Movimientos VALUES(C1,B,3/04/2019,1000)
UPDATE ClientesBanca SET Saldo=Saldo+1000

BEGIN TRANSACTION PRUEBA1
INSERT INTO ClientesBanca VALUES('001', 'Manuel Rios Maldonado', 9000);
INSERT INTO ClientesBanca VALUES('002', 'Pablo Perez Ortiz', 5000);
INSERT INTO ClientesBanca VALUES('003', 'Luis Flores Alvarado', 8000);
COMMIT TRANSACTION PRUEBA1

SELECT * FROM ClientesBanca

BEGIN TRANSACTION PRUEBA3
INSERT INTO TiposMovimiento VALUES('A','Retiro Cajero Automatico');
INSERT INTO TiposMovimiento VALUES('B','Deposito Ventanilla');
COMMIT TRANSACTION PRUEBA3

BEGIN TRANSACTION PRUEBA4
INSERT INTO Realizan VALUES('001','A',GETDATE(),500);
UPDATE ClientesBanca SET Saldo = Saldo -500
WHERE NoCuenta='001'
COMMIT TRANSACTION PRUEBA4

SELECT * FROM ClientesBanca
SELECT * FROM Realizan
  SELECT * FROM TiposMovimiento


DELETE FROM ClientesBanca WHERE NoCuenta='005'

BEGIN TRANSACTION PRUEBA5
INSERT INTO ClientesBanca VALUES('005','Rosa Ruiz Maldonado',9000);
INSERT INTO ClientesBanca VALUES('006','Luis Camino Ortiz',5000);
INSERT INTO ClientesBanca VALUES('001','Oscar Perez Alvarado',8000);



IF @@ERROR = 0
COMMIT TRANSACTION PRUEBA5
ELSE
BEGIN
PRINT 'A transaction needs to be rolled back'
ROLLBACK TRANSACTION PRUEBA5
END

  SELECT * FROM ClientesBanca
SELECT * FROM Realizan

  /*
  ¿Para qué sirve el comando @@ERROR revisa la ayuda en línea?
Para que en caso de un error, se haga un rollback de los datos
¿Qué hace la transacción?
Trata de insertar valores a la tabla pero en un valor la llave primaria se repite porque ya existe
¿Hubo alguna modificación en la tabla? Explica qué pasó y por qué.
No, porque al haber un error se ejecutó un roolback y no se inserto ningun valor*/

  /*
Una transacción que registre el retiro de una cajero. nombre del store procedure REGISTRAR_RETIRO_CAJERO que recibe 2 parámetros en NoCuenta y el monto a retirar.

Una transacción que registre el deposito en ventanilla. Nombre del store procedure REGISTRAR_DEPOSITO_VENTANILLA que recibe 2 parámetros en NoCuenta y el monto a depositar.

Las transacciones deben de ser diseñadas para que en caso de que ocurra algún error la base de datos mantenga su consistencia.*/

CREATE PROCEDURE REGISTRAR_RETIRO_CAJERO
    @nocuenta VARCHAR(5),
    @monto NUMERIC(10,2)
AS
  BEGIN TRANSACTION PRUEBA1

  INSERT INTO Realizan VALUES(@nocuenta,'A',getdate(),@monto);
  UPDATE ClientesBanca SET Saldo=Saldo-@monto WHERE NoCuenta =@nocuenta

  IF @@ERROR = 0
  COMMIT TRANSACTION PRUEBA1
  ELSE
  BEGIN
  PRINT 'A transaction needs to be rolled back'
  ROLLBACK TRANSACTION PRUEBA1
  END
GO

EXECUTE REGISTRAR_RETIRO_CAJERO '001', 300

CREATE PROCEDURE REGISTRAR_DEPOSITO_VENTANILLA
    @nocuenta VARCHAR(5),
    @monto NUMERIC(10,2)
AS
    BEGIN TRANSACTION PRUEBA2

    INSERT INTO Realizan VALUES(@nocuenta,'B',getdate(),@monto)
    UPDATE ClientesBanca SET Saldo=Saldo+@monto WHERE NoCuenta =@nocuenta

    IF @@ERROR = 0
    COMMIT TRANSACTION PRUEBA2
    ELSE
    BEGIN
    PRINT 'A transaction needs to be rolled back'
    ROLLBACK TRANSACTION PRUEBA2
    END
GO

EXECUTE REGISTRAR_DEPOSITO_VENTANILLA '001', 300