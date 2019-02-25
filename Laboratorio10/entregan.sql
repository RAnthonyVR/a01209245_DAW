 SET DATEFORMAT dmy
 BULK INSERT a1209245.a1209245.[Entregan]
   FROM 'e:\wwwroot\a1209245\entregan.csv'
   WITH 
      (
         CODEPAGE = 'ACP',
         FIELDTERMINATOR = ',',
         ROWTERMINATOR = '\n'
      )