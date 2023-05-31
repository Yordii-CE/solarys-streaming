# Getting started

1. Dowload this framework.
2. Working in the App folder (Ignoring Core and Screenshot folder).

![Descripción de la imagen](/screenshots/app_folder.png)

# Nomenclature

### Files

- Controllers: Point nomenclature and in lower case, all must end in '.controller', example (articles.controller).

- Models: Point nomenclature and in lower case, all must end in '.model', example (articles.model).

- Views: Create a folder for each controller and within all the actions/functions that the controller has defined:

![Descripción de la imagen](/screenshots/view_folder.png)

### Classes

- Controllers: UpperCamelCase, all must end in 'Controller', example (ArticlesController).

- Models class name: UpperCamelCase, all must end in 'Model', example (ArticlesModel).

# Create from command line

### Controller, Model and View

`` `
$ .bat articles
`` 

### Only Controller and Model

`` `
$ .bat articles -true -false
`` 

### Only Controller

`` `
$ .bat articles -false -false
`` 

# Features

### Automatic views

You don't need to specify the view name. The default action name is taken:

![Descripción de la imagen](/screenshots/view.png)

### Send data

You can send data in an associative array indicating the name with which you would like to use them in your view:

![Descripción de la imagen](/screenshots/view_with_data.png)

![Descripción de la imagen](/screenshots/data_in_view.png)

### Specify view and data

You can speciy the view name and the data name.

![Descripción de la imagen](/screenshots/view_with_both.png)

### View variables

You can access these variables in any view: $CONTROLLER, $ACTION, $BASE_URL.

### Use params

You can send parameters to a certain action
We can obtain the parameters as follows.

- articles/index/1

![Descripción de la imagen](/screenshots/params.png "articles/index/1")

- articles/index/1/Yordii

![Descripción de la imagen](/screenshots/params_two.png "articles/index/1/Yordii")

# Template (shared folder)

There will always be files 'footer' and 'header', these will wrap all views. You can add other components like 'menu' etc and add them to any part of your template stored in your 'shared' folder.

### Omit template 

You can omit the template that wraps the view with a third parameter.

![Descripción de la imagen](/screenshots/omit_template.png)

# Connect to Mysql

1. In the config file you can set your connection data.

![Descripción de la imagen](/screenshots/config.png)

2. You will have to load your database in your model, the load is not automatic because not all models can obtain data from a database, so resources are saved.

![Descripción de la imagen](/screenshots/model_to_mysql.png)

3. Finally in your controller you can use your model and access your data as follows.

![Descripción de la imagen](/screenshots/controller_to_mysql.png)

# Contributions

Your contributions are welcome! If you want to collaborate in this project, please follow the steps below:

1. Fork this repository and clone your own copy to your local machine.
2. Create a new branch to make your changes: `git checkout -b additional`.
3. Make changes and improvements to the code.
4. Make sure your changes follow the style guides and best practices of the project.
5. Commit your changes: `git commit -m "Description of changes"`.
6. Push your changes to your remote repository: `git push origin additional`.
7. Open a Pull Request to this main repository and describe the changes you have made.
8. Wait for your changes to be reviewed and merged.

# Contact

If you have any questions or suggestions related to this project, feel free to contact me. You can find me at [yokdy360@gmail.com](mailto:yokdy360@gmail.com).

# License

This project is licensed under the [MIT](https://opensource.org/licenses/MIT) License. If you use this code, please include the LICENSE file in your project.

