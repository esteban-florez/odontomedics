# Especificación de Requerimientos

## Entrada

- Datos de pacientes: Nombre, apellido, dirección, teléfono, correo electrónico, fecha de nacimiento, sexo, seguro médico, historial clínico.
- Datos de citas: Fecha, hora, paciente, odontólogo, servicio.
- Datos de tratamientos: Descripción del tratamiento, materiales utilizados, costo.
- Datos de facturación: Fecha, paciente, descripción del servicio, monto, forma de pago.
- Datos de inventario: Producto, descripción, cantidad, precio, proveedor.

## Proceso

- Gestión de pacientes: Registro, actualización y consulta de información de pacientes.
- Gestión de citas: Programación de citas, asignación de pacientes a los odontólogos, gestión del calendario de citas, envío de recordatorios a los pacientes y seguimiento de las citas.
- Gestión de historiales clínicos: Registro, actualización y consulta del historial clínico de los pacientes.
- Facturación: Generación de facturas electrónicas, registro de pagos, consulta del historial de facturación y generación de informes de facturación.
- Control de inventario: Registro, actualización y consulta del stock de materiales odontológicos, medicamentos y otros insumos, generación de alertas de stock bajo y realización de pedidos de compra.

## Salida

- Informes de pacientes: Listado de pacientes, historial clínico de pacientes.
- Informes de citas: Calendario de citas, lista de citas por paciente, lista de citas por odontólogo.
- Informes de historiales clínicos: Historial clínico de pacientes, etc.
- Informes de facturación: Historial de facturación, informes de ventas por período.
- Informes de inventario: Listado de productos, stock de productos, alertas de stock bajo.
- Informes de gestión: Informes sobre el funcionamiento de la clínica, incluyendo datos de pacientes, citas, facturación, inventario y otros aspectos.

## Propuesta de Product Backlog

- Epic 1: Gestión de Pacientes
  - PBI 1.1: Registrar nuevo paciente (Nombre, apellido, dirección, teléfono, correo electrónico, fecha de nacimiento, sexo, seguro médico).
  - PBI 1.2: Actualizar información de paciente existente.
  - PBI 1.3: Consultar información de paciente por nombre, apellido o ID.
  - PBI 1.4: Asociar historial clínico al paciente.

- Epic 2: Gestión de Citas
  - PBI 2.1: Programar una nueva cita (Fecha, hora, paciente, odontólogo, servicio).
  - PBI 2.2: Cancelar o reprogramar una cita.
  - PBI 2.3: Listar citas por odontólogo y por paciente.

- Epic 3: Gestión de Historiales Clínicos
  - PBI 3.1: Registrar un nuevo tratamiento (Descripción, materiales, costo)
  - PBI 3.2: Asociar tratamientos a un paciente.
  - PBI 3.3: Consultar historial clínico completo de un paciente.

- Epic 4: Gestión de Facturación
  - PBI 4.1: Generar factura por servicio realizado.
  - PBI 4.2: Consultar historial de facturación de un paciente.
  - PBI 4.3: Generar reportes de ingresos mensuales y anuales

- Epic 5: Gestión de Inventario
  - PBI 5.1: Registrar nuevo producto (Descripción, cantidad, precio, proveedor)
  - PBI 5.2: Actualizar stock de productos.
  - PBI 5.3: Generar alertas de bajo stock.
  - PBI 5.4: Realizar pedidos de compra.

- Epic 6: Informes y Reportes
  - PBI 6.1: Generar reporte de pacientes activos.
  - PBI 6.2: Generar reporte de citas por mes.
  - PBI 6.3: Generar reporte de ingresos por servicio.
  - PBI 6.4: Generar reporte de stock de productos.

