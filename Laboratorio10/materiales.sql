BULK INSERT a1209245.a1209245.[Materiales]
   FROM 'e:\wwwroot\a1209245\materiales.csv'
   WITH 
      (
         CODEPAGE = 'ACP',
         FIELDTERMINATOR = ',',
         ROWTERMINATOR = '\n'
      )