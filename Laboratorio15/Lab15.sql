SELECT *
FROM Materiales

SELECT DISTINCT M.Clave,Descripcion
FROM Materiales M, Entregan E
WHERE M.Clave=E.Clave

select * from materiales

select * from materiales
where clave=1000

select clave,rfc,fecha from entregan

select * from materiales,entregan
where materiales.clave = entregan.clave

select * from entregan,proyectos
where entregan.numero <= proyectos.numero

(select * from entregan where clave=1450)
union
(select * from entregan where clave=1300)


select * from entregan where clave=1450 OR clave=1300

(select clave from entregan where numero=5001)
intersect
(select clave from entregan where numero=5018)

(select clave from entregan where numero=5001 AND clave IN
(select clave from entregan where numero=5018))

(select * from entregan)
minus
(select * from entregan where clave=1000)

//
(select * from entregan where clave NOT IN
(select clave from entregan where clave=1000))


select * from entregan,materiales

set dateformat dmy
Select DISTINCT m.descripcion FROM materiales as m, entregan WHERE m.clave=entregan.clave AND fecha>='01-JAN-2000' AND fecha<='31-DEC-2000'

set dateformat dmy
Select p.numero, p.denominacion, e.Fecha, e.cantidad
FROM entregan AS e, proyectos AS p
WHERE p.numero=e.numero
ORDER BY p.Numero asc, e.Fecha desc

SELECT * FROM materiales where Descripcion LIKE 'Si%'


DECLARE @foo varchar(40);
DECLARE @bar varchar(40);
SET @foo = '¿Que resultado';
SET @bar = ' ¿¿¿??? '
SET @foo += ' obtienes?';
PRINT @foo + @bar;

SELECT RFC FROM Entregan WHERE RFC LIKE '[A-D]%';
SELECT RFC FROM Entregan WHERE RFC LIKE '[^A]%';
SELECT Numero FROM Entregan WHERE Numero LIKE '___6';

SELECT Clave,RFC,Numero,Fecha,Cantidad
FROM Entregan
WHERE Fecha Between '01-JAN-2000' and '31-DEC-2000';

SELECT RFC,Cantidad, Fecha,Numero
FROM [Entregan]
WHERE [Numero] Between 5000 and 5010 AND
Exists ( SELECT [RFC]
FROM [Proveedores]
WHERE RazonSocial LIKE 'La%' and [Entregan].[RFC] = [Proveedores].[RFC] )

SELECT RFC,Cantidad, Fecha,Numero
FROM [Entregan] e
WHERE [Numero] Between 5000 and 5010 AND  e.RFC
IN (SELECT [RFC]
FROM [Proveedores]
WHERE RazonSocial LIKE 'La%' )

SELECT RFC,Cantidad, Fecha,Numero
FROM [Entregan]
WHERE [Numero] Between 5000 AND 5010 AND  RFC
NOT IN ( SELECT [RFC]
FROM [Proveedores]
WHERE RazonSocial NOT LIKE 'La%' AND [Entregan].[RFC] = [Proveedores].[RFC] )

SELECT TOP 2 * FROM Proyectos

SELECT TOP Numero FROM Proyectos


ALTER TABLE materiales ADD PorcentajeImpuesto NUMERIC(6,2);

UPDATE materiales SET PorcentajeImpuesto = 2*clave/1000;

/*¿Qué consulta usarías para obtener el importe de las entregas es decir, el total en dinero de lo entregado, basado en la cantidad de la entrega y el precio del material y el impuesto asignado? */
SELECT E.Clave, E.Cantidad*(M.Costo*(PorcentajeImpuesto/100)+1) as "Total"
FROM Materiales M, Entregan E
WHERE M.Clave=E.Clave

CREATE VIEW totalEntregado(Clave,Total) AS
SELECT E.Clave, E.Cantidad*(M.Costo*(PorcentajeImpuesto/100)+1)
FROM Materiales M, Entregan E
WHERE M.Clave=E.Clave

select * from  totalEntregado

/*5 consultas con vistas*/

/*Los materiales (clave y descripción) entregados al proyecto "México sin ti no estamos completos". */
CREATE VIEW materialesMexico(Clave,Descripcion) AS
SELECT E.Clave, M.Descripcion
FROM Materiales as M, Entregan as E, Proyectos as P
WHERE M.Clave=E.Clave AND P.Denominacion='Mexico sin ti no estamos completos'

select * from materialesMexico

/*Los materiales (clave y descripción) que han sido proporcionados por el proveedor "Acme tools".*/
CREATE VIEW materialesAcme(Clave,Descripcion) AS
SELECT E.Clave, M.Descripcion
FROM Materiales as M, Entregan as E, Proveedores as P
WHERE M.Clave=E.Clave AND P.RFC=E.RFC AND P.RazonSocial='Acme tools'

DROP VIEW materialesAcme

select * from materialesAcme


/*El RFC de los proveedores que durante el 2000 entregaron en promedio cuando menos 300 materiales. */
set dateformat dmy

CREATE VIEW menosDeDosMil(RFC) AS
SELECT E.RFC
FROM Entregan as E
WHERE E.Cantidad>=300 AND (Fecha Between '01-JAN-2000' AND '31-DEC-2000')
/*Salida:
AAAA800101
BBBB800101
Numero de tuplas: 8*/

select * from menosDeDosMil

/*4 El Total entregado por cada material en el año 2000. */
CREATE VIEW totalEntregado2000(Clave, total) AS
SELECT E.Clave, SUM(Cantidad) as 'Total'
FROM Entregan as E
WHERE (Fecha Between '01-JAN-2000' AND '31-DEC-2000')
GROUP BY E.Clave

select * from totalEntregado2000

/*Salida:
Clave  Total
1000    7.00
Numero de tuplas:22*/

/*5 La Clave del material más vendido durante el 2001. (se recomienda usar una vista intermedia para su solución) */
CREATE VIEW masVendido2001(Clave,Cantidad) AS
SELECT TOP 1 E.Clave, SUM(Cantidad) as 'Total'
FROM Entregan as E
WHERE (Fecha Between '01-JAN-2001' AND '31-DEC-2001')
GROUP BY E.Clave
ORDER BY Total DESC

select * from masVendido2001
/*Salida:
Clave  Total
1020    1060.00
Numero de tuplas:1*/

/*6 Productos que contienen el patrón 'ub' en su nombre. */
CREATE VIEW productoUB(descripcion) AS
SELECT descripcion
FROM Materiales AS M
WHERE descripcion LIKE '%ub%';

select * from productoUB
/*Salida:
Clave  Nombre
1180    Recubimiento P1001
1190    Recubimiento P1010
Numero de tuplas:12*/



/*7 Denominación y suma del total a pagar para todos los proyectos. */
CREATE VIEW denominacionSuma(denominacion ,sumaTotal) AS
SELECT P.Denominacion, SUM(E.Cantidad*(M.Costo*(PorcentajeImpuesto/100)+1)) as "Total"
FROM Entregan AS E, Proyectos AS P, Materiales AS M
WHERE P.Numero=E.Numero AND M.Clave=E.Clave
GROUP BY P.Denominacion

select * from denominacionSuma
/*Salida:
Denominacion                                Total
Ampliación de la carretera a la huasteca 742461.1940000000
Aztecón                                  150200.2190000000
Numero de tuplas:20*/


/*8 Denominación, RFC y RazonSocial de los proveedores que se suministran materiales al proyecto Televisa en acción que no se encuentran apoyando al proyecto Educando en Coahuila (Solo usando vistas). */

CREATE VIEW televisaNoCoahuila1(denominacion , RFC, RazonSocial) AS
     (  SELECT DISTINCT P.Denominacion, PR.RFC, PR.RazonSocial
     FROM Entregan AS E, Proyectos AS P, Proveedores as PR
     WHERE P.Numero=E.Numero AND PR.RFC=E.RFC AND P.Denominacion LIKE 'Tel%' AND PR.RFC NOT IN (SELECT PR.RFC FROM Entregan AS E, Proyectos AS P, Proveedores as PR
     WHERE P.Numero=E.Numero AND PR.RFC=E.RFC AND P.Denominacion LIKE 'Edu%' ))

select * from televisaNoCoahuila1

DROP VIEW televisaNoCoahuila1
/*Salida:
denominacion         RFC      RazonSocial
Televisa en acción CCCC800101 La Ferre
Televisa en acción DDDD800101 Cecoferre
Numero de tuplas:2*/


/*9 Denominación, RFC y RazonSocial de los proveedores que se suministran materiales al proyecto Televisa en acción que no se encuentran apoyando al proyecto Educando en Coahuila (Sin usar vistas, utiliza not in, in o exists).*/

SELECT DISTINCT P.Denominacion, PR.RFC, PR.RazonSocial
     FROM Entregan AS E, Proyectos AS P, Proveedores as PR
     WHERE P.Numero=E.Numero AND PR.RFC=E.RFC AND P.Denominacion LIKE 'Tel%' AND PR.RFC NOT IN (SELECT PR.RFC FROM Entregan AS E, Proyectos AS P, Proveedores as PR
     WHERE P.Numero=E.Numero AND PR.RFC=E.RFC AND P.Denominacion LIKE 'Edu%' )
/*Salida:
denominacion         RFC      RazonSocial
Televisa en acción CCCC800101 La Ferre
Televisa en acción DDDD800101 Cecoferre
Numero de tuplas:2*/

/*10 Costo de los materiales y los Materiales que son entregados al proyecto Televisa en acción cuyos proveedores también suministran materiales al proyecto Educando en Coahuila.*/
CREATE VIEW costoMaterialesTelCoah(costo ,descripcion) AS
     SELECT M.Costo, M.Descripcion
     FROM Entregan AS E, Proyectos AS P, Materiales AS M, Proveedores AS PR
     WHERE P.Numero=E.Numero AND PR.RFC=E.RFC AND M.Clave=E.Clave AND M.Clave=E.Clave AND P.Denominacion LIKE 'Tel%' AND PR.RFC IN(
       SELECT PR.RFC
       FROM Entregan AS E, Proyectos AS P, Proveedores as PR
       WHERE P.Numero=E.Numero AND PR.RFC=E.RFC AND P.Denominacion LIKE 'Edu%'
       )

DROP VIEW costoMaterialesTelCoah

select * from costoMaterialesTelCoah
/*Salida:
Ladrillos rojos  50.00
Tepetate         34.00
Numero de tuplas:2*/

/*11 Nombre del material, cantidad de veces entregados y total del costo de dichas entregas por material de todos los proyectos. */
CREATE VIEW totalmateriales(nombre,proyecto, cantidadEntrega,costoTotal) AS
SELECT M.Descripcion, P.Denominacion, SUM(E.Cantidad) as 'cantidadEntrega', SUM(E.Cantidad*(M.Costo*(PorcentajeImpuesto/100)+1)) as "costoTotal"
FROM Entregan AS E, Materiales AS M,  Proyectos AS P
WHERE M.Clave=E.Clave AND P.Numero=E.Numero
GROUP BY M.Descripcion, P.Denominacion

DROP VIEW totalmateriales

select * from totalmateriales
/*Salida:
nombre  proyecto  cantidadEntrega  costoTotal
Tezontle  Televisa en acción 2      67832.16
Tepetatte  Televisa en acción 2     3544.8672
Numero de tuplas:87*/
