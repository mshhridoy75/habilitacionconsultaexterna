# Habilitacionconsultaexterna

**A & V Processes Enablement Standard Quality Entrepreneurs**

This project enables standard quality processes for medical entrepreneurs. It provides a comprehensive web-based platform to manage users, medical standards, clinical records, equipment, and priority processes.

---

## 📜 **Project Description**

The platform offers the following features:
- **User Authentication**: Secure login and session management.
- **Management of Standards**: Create and manage medical quality standards.
- **Clinical History**: Storage and retrieval of clinical data.
- **Equipment Management**: Manage medical infrastructure and equipment records.
- **Operational Processes**: Record critical medical processes and human resource data.
- **Database Integration**: Pre-configured tables and relationships ensure smooth operation.

---

## 🚀 **Features**
1. **User Management**: Admin and odontologist roles for secure access.
2. **Clinical Operations**: Clinical history, treatment plans, and patient records.
3. **Equipment & Medicine Management**: Detailed records for resources and medical supplies.
4. **Human Resource Management**: Manage documents and personnel records.
5. **Database Integration**: Leverages `expertocalidad` database for data-driven operations.

---

## ⚙️ **Installation**

### **Prerequisites**
1. **PHP**: Version 7.4 or higher.
2. **MySQL**: Version 5.7 or higher.
3. **XAMPP** (or any local server).
4. **Composer** (optional for dependency management).

---

### **Setup Steps**

1. **Clone the Repository**
   ```bash
   git clone https://github.com/your-repo/habilitacionconsultaexterna.git
   ```

2. **Database Configuration**
   - Use the provided `expertocalidad.sql` or `u368085307_expertocalidad.sql` file located in the root directory.
   - Import the database:
     ```sql
     CREATE DATABASE expertocalidad;
     USE expertocalidad;
     SOURCE expertocalidad.sql;
     ```
   - **Note**: All required tables are pre-configured in the provided SQL files.

3. **Configure Database Connection**
   Update the `conexion.php` file located in `habilitacionconsultaexterna/app/db/` with your database credentials:
   ```php
   <?php
   $host = 'localhost';
   $user = 'root';  // Set your MySQL user
   $password = '';  // Set your MySQL password
   $dbname = 'expertocalidad'; // Database name
   $conn = new mysqli($host, $user, $password, $dbname);
   if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   }
   ?>
   ```

4. **Run the Application**
   - Place the project folder (`habilitacionconsultaexterna`) in your `htdocs` directory.
   - Start Apache and MySQL services in XAMPP.
   - Open the project in your browser:
     ```
     http://localhost/habilitacionconsultaexterna
     ```

---

## 🗂️ **Project Structure**

### **Root Files**
- `index.php` : Main login page.
- `cuentaAdmin.php` : Admin account view.
- `cuentaOdonto.php` : Odontologist account view.
- `principalAdmin.php` : Admin dashboard.
- `principalOdontologo.php` : Odontologist dashboard.
- `gestionAdmin.php` / `gestionUsuarios.php`: User and admin management.
- `expertocalidad.sql` : Pre-configured database schema.

---

### **Subfolders**

1. **app/css/**  
   Contains CSS files for styling, including Bootstrap.

2. **app/db/**  
   Handles database operations and connections (`conexion.php`, `auth.php`).

3. **app/Dotacion/**  
   Manages medical equipment data (`docsDOT.php`, `mantEquiDOT.php`).

4. **app/Historia Clinica/**  
   Handles clinical history records (`docsHC.php`, `nuevaHC.php`).

5. **app/img/**  
   Stores image assets such as logos and backgrounds.

6. **app/Infraestructura/**  
   Manages infrastructure records (`docsINF.php`, `evaluacionINF.php`).

7. **app/Medicamentos/**  
   Manages medical supplies and records (`controlTempMED.php`, `registroMedMED.php`).

8. **app/Procesos Prioritarios/**  
   Records critical priority processes (`fallasAtencionPP.php`, `seguridadPacientePP.php`).

9. **app/Talento Humano/**  
   Manages human resources and related documents (`docsTH.php`, `subirDocAdm.php`).

10. **app/js/**  
    Contains JavaScript files, including Bootstrap dependencies.

11. **app/scss/**  
    SCSS files for extended styling and design.

---

## 🗄️ **Database**

The database `expertocalidad` is pre-configured and contains all necessary tables. You do **not** need to recreate them. The main tables include:
- `usuario` : User management (admin, odontologist).
- `sede` : Locations and facility management.
- `Estandares` : Medical standards.
...........

---

## 💻 **Usage**

1. **Login**  
   Access the platform using admin credentials or register a new user.

2. **Admin Dashboard**  
   Manage users, locations (Sedes), and medical standards.

3. **Odontologist Dashboard**  
   Access treatment plans, clinical data, and record priority processes.

4. **Medical Management**  
   Upload documents, track resources, and monitor standards.

---

## 🛠️ **Troubleshooting**

1. **"Access Denied for User" Error**  
   Ensure the MySQL user has sufficient privileges:
   ```sql
   GRANT ALL PRIVILEGES ON expertocalidad.* TO 'root'@'localhost';
   FLUSH PRIVILEGES;
   ```

2. **"Undefined Array Key" Error**  
   Verify that session variables and `$_POST` or `$_GET` parameters are properly set.

3. **"Table Doesn't Exist" Error**  
   Ensure the `expertocalidad.sql` file is imported correctly into the database.

---

## 👥 **Contribution**

Contributions are welcome!  
- Fork the repository.  
- Submit a pull request with your improvements.

---

## 📜 **License**

This project is licensed under the **MIT License**.

--- 
