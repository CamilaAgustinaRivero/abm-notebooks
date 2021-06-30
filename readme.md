# Trabajo práctico - Rivero, Camila Agustina
_Gestión de notebooks_

# Pre-requisitos
- Importar base de datos desde db_scripts/dump-curso_php.sql

# Características
- user:admin pass: 123456
- Solo se puede visualizar la Home sin iniciar sesión.
- Al iniciar sesión o cerrar sesión se redirige a la Home.

# Archivos
<pre>
abm-notebooks
|   articles.php
|   calculator.php
|   delete-article.php
|   edit-article.php
|   index.php
|   login.php
|   logout.php
|   new-article.php
|   readme.md
|   search-article.php
|   
+---controllers
|       ArticleController.php
|       BrandController.php
|       CalculatorController.php
|       LoginController.php
|       
+---css
|       styles.css
|       
+---database
|       config.php
|       Connection.php
|       
+---db_scripts
|       dump-curso_php-202106300246.sql
|       
+---img
|       favicon.png
|       
+---layouts
|       footer.php
|       head.php
|       header.php
|       
\---models
        Article.php
        Brand.php
        User.php
</pre>