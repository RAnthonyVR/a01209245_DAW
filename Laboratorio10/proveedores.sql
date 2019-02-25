 BULK INSERT a1209245.a1209245.[Proveedores]
   FROM 'e:\wwwroot\a1209245\proveedores.csv'
   WITH 
      (
         CODEPAGE = 'ACP',
         FIELDTERMINATOR = ',',
         ROWTERMINATOR = '\n'
      )