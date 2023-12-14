const cron = require('node-cron');
const { exec } = require('child_process');

// Expresión cron para ejecutar cada 5 minutos
cron.schedule('*/5 * * * * *', () => {
  const phpScriptPath = './monitor.php';
  const command = `php ${phpScriptPath}`;

  exec(command, (error, stdout, stderr) => {
    if (error) {
      console.error(`Error al ejecutar el script PHP: ${error.message}`);
      return;
    }
    
    if (stderr) {
      console.error(`Error en la salida del script PHP: ${stderr}`);
      return;
    }
    console.log(`Script PHP ejecutado con éxito:\n${stdout}`);
  });
});