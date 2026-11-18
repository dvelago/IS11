const { Builder, By } = require('selenium-webdriver');
const assert = require('assert');

async function ejecutarSimulacion() {
    let driver = await new Builder().forBrowser('chrome').build();

    try {
        await driver.get('http://localhost/proyMVC/');

        await driver.findElement(By.name('dni')).sendKeys('78451234');
        await driver.findElement(By.name('nombres')).sendKeys('Diego PRUEBA');
        await driver.findElement(By.name('apellidos')).sendKeys('Vela');

    } catch (error) {
        console.error("Error en la automatización: ", error);
    } finally {
        await new Promise(resolve => setTimeout(resolve, 15000));
        await driver.quit();
    }
}

ejecutarSimulacion();