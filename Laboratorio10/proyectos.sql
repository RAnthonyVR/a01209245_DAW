 BULK INSERT a1209245.a1209245.[Proyectos]
   FROM 'e:\wwwroot\a1209245\proyectos.csv'
   WITH 
      (
         CODEPAGE = 'ACP',
         FIELDTERMINATOR = ',',
         ROWTERMINATOR = '\n'
      )