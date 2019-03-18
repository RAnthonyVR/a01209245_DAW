
/*Laboratorio 18*/

/*La suma de las cantidades e importe total de todas las entregas realizadas durante el 97. */
SET DATEFORMAT DMY
SELECT SUM(E.Cantidad) AS 'Suma cantidades', SUM (E.Cantidad*((M.Costo*((m.PorcentajeImpuesto/100)+1)))) AS 'importe total'
FROM Entregan AS E, Materiales AS M
WHERE M.Clave=E.Clave AND (E.Fecha BETWEEN '01/01/1997' AND '31/12/1997')
/*SALIDA:
1 tupla
Clave  Suma cantidades  importe total
1270      546             44789.472
*/


/*Para cada proveedor, obtener la razón social del proveedor, número de entregas e importe total de las entregas realizadas. */
SELECT Prov.RazonSocial, COUNT(E.Cantidad) AS 'número de entregas', SUM (((M.Costo*((m.PorcentajeImpuesto/100)+1)))*E.Cantidad) AS 'importe total'
FROM Proveedores AS Prov, Entregan AS E, Materiales AS M
WHERE Prov.RFC=E.RFC AND M.Clave=E.Clave
GROUP BY Prov.RazonSocial
/*SALIDA:
8 tuplas
Muestra:
RazonSocial número de entregas  importe total
Alvin         15                 794295.2064
Cecoferre     18                 860441.977
*/



/*Por cada material obtener la clave y descripción del material, la cantidad total entregada,
la mínima cantidad entregada, la máxima cantidad entregada, el importe total de las entregas
de aquellos materiales en los que la cantidad promedio entregada sea mayor a 400. */

SELECT M.Clave, M.Descripcion, SUM(E.Cantidad) AS 'cantidad total entregada', MIN(E.Cantidad) AS 'minima cantidad entregada', MAX(E.Cantidad) AS 'maxima cantidad entregada', SUM(((M.Costo*((m.PorcentajeImpuesto/100)+1)))*E.Cantidad) AS 'importe total'
FROM Materiales AS M, Entregan AS E
where M.Clave=E.Clave
GROUP BY M.Clave, M.Descripcion
HAVING AVG(E.Cantidad)>400
/*SALIDA:
15 tuplas
Muestra:
Clave Descripcion  cantidad total entregada  minima cantidad entregada  maxima cantidad entregada  importe total
1010  Varilla 4/32  1718.00                   523.00                      667.00                    201560.9140
1040  Varilla 3/18  1349.00                   263.00                      546.00                    220329.472
*/


/*Para cada proveedor, indicar su razón social y mostrar la cantidad promedio de cada material
 entregado, detallando la clave y descripción del material, excluyendo aquellos proveedores
para los que la cantidad promedio sea menor a 500.*/
SELECT Prov.RazonSocial, AVG(E.Cantidad) AS 'Promedio de material', m.Clave, M.Descripcion
FROM Proveedores AS Prov,Materiales AS M, Entregan AS E
WHERE Prov.RFC=E.RFC AND M.Clave=E.Clave
GROUP BY Prov.RazonSocial, m.Clave, M.Descripcion
HAVING AVG(E.Cantidad) >= 500
/*SALIDA:
3 tuplas
Muestra:
RazonSocial  Promedio de material  Clave  Descripcion
Oviedo        572.666666            1010  Varilla 4/32
La Ferre      562.666666            1100  Block
*/

/*Mostrar en una solo consulta los mismos datos que en la consulta anterior pero para dos grupos de proveedores: aquellos
para los que la cantidad promedio entregada es menor a 370 y aquellos para los que la cantidad promedio entregada sea
mayor a 450.*/
SELECT Prov.RazonSocial, AVG(E.Cantidad) AS 'Promedio de material', m.Clave, M.Descripcion
FROM Proveedores AS Prov,Materiales AS M, Entregan AS E
WHERE Prov.RFC=E.RFC AND M.Clave=E.Clave
GROUP BY Prov.RazonSocial, m.Clave, M.Descripcion
HAVING AVG(E.Cantidad) < 370 OR AVG(E.Cantidad) > 450

/*SALIDA:
34 tuplas
Muestra:
RazonSocial  Promedio de material  Clave  Descripcion
La fragua     142                   1000  Varilla 3/16
Oviedo        572.666666            1010  Varilla 4/32
*/

/*Inserción*/

INSERT INTO Materiales VALUES (1440, 'Manguera 50', 400, 5.5);
INSERT INTO Materiales VALUES (1450, 'Columna 50', 10000, 8);
INSERT INTO Materiales VALUES (1460, 'Piso 50x50', 100, 3);
INSERT INTO Materiales VALUES (1470, 'Remachador', 1000, 2);
INSERT INTO Materiales VALUES (1480, 'Barra aluminio 3/8', 200, 3.02);

SELECT * FROM Materiales

-- PARTE 3

/*Clave y descripción de los materiales que nunca han sido entregados. */
SELECT M.Clave, M.Descripcion
FROM Materiales AS M
WHERE M.Clave NOT IN (
SELECT E.Clave
FROM Entregan AS E)

/*SALIDA:
5 tuplas
Muestra:
Clave  Descripcion
1440    Taladro
1450    Sierra
*/

/*Razón social de los proveedores que han realizado entregas tanto al
proyecto 'Vamos México' como al proyecto 'Querétaro Limpio'. */

SELECT Prov.RazonSocial
FROM Proveedores AS Prov, Proyectos AS P
WHERE Prov.RazonSocial IN(
  SELECT Prov.RazonSocial
  FROM Proveedores AS Prov
  WHERE Prov.RazonSocial='Vamos México'
) AND Prov.RFC IN(
  SELECT Prov.RazonSocial
  FROM Proveedores AS Prov
  WHERE Prov.RazonSocial='Querétaro Limpio'
)
  /*SALIDA:
1 tupla
Muestra:
RazonSocial
La fragua
*/

/*Descripción de los materiales que nunca han sido entregados al
proyecto 'CIT Yucatán'. */

SELECT M.Descripcion
FROM Materiales AS M
WHERE M.Clave NOT IN
      (
  SELECT E.Clave
  FROM Proyectos AS P, Entregan AS E
  WHERE P.Numero=E.Numero AND P.Denominacion LIKE 'CIT Yucatan'
)
  SELECT *FROM Materiales
select * from Proyectos p, entregan e where e.Numero=p.Numero
  /*SALIDA:
45 tuplas
Muestra:
Descripcion
Varilla 3/16
Varilla 4/32
*/

/*Razón social y promedio de cantidad entregada de los proveedores
cuyo promedio de cantidad entregada es mayor al promedio de la cantidad
entregada por el proveedor con el RFC 'VAGO780901'. */

SELECT Prov.RazonSocial, AVG(E.Cantidad) AS 'Promedio de cantidad entregada'
FROM Entregan AS E, Proyectos AS P,Proveedores AS Prov
WHERE P.Numero=E.Numero AND Prov.RFC=E.RFC
GROUP BY Prov.RazonSocial
HAVING AVG(E.Cantidad)> (SELECT AVG(E.Cantidad)
  FROM Entregan AS E
  WHERE E.RFC='VAGO780901'
)
  /*SALIDA:
0 tuplas
RazonSocial  Promedio de cantidad entregada
*/

/*RFC, razón social de los proveedores que participaron en el proyecto
'Infonavit Durango' y cuyas cantidades totales entregadas en el 2000
fueron mayores a las cantidades totales entregadas en el 2001.*/

set dateformat dmy
SELECT Prov.RFC, Prov.RazonSocial
FROM Entregan AS E, Proyectos AS P,Proveedores AS Prov
WHERE P.Numero=E.Numero AND Prov.RFC=E.RFC and Prov.RazonSocial='Infonavit Durango'
GROUP BY Prov.RFC, Prov.RazonSocial
  HAVING (SELECT SUM(E.Cantidad)
  FROM Entregan AS E, Proyectos AS P,Proveedores AS Prov
  WHERE P.Numero=E.Numero AND Prov.RFC=E.RFC AND (E.Fecha BETWEEN '01/01/2000' AND '31/12/2000')
)
  > (SELECT SUM(E.Cantidad)
  FROM Entregan AS E, Proyectos AS P,Proveedores AS Prov
  WHERE P.Numero=E.Numero AND Prov.RFC=E.RFC AND (E.Fecha BETWEEN '01/01/2001' AND '31/12/2001')
)

/*SALIDA:
0 tuplas
RFC RazonSocial
*/