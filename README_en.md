# RagFlow Plugin for GLPI

This plugin integrates RagFlow AI Assistant into GLPI, providing users with easy access to AI assistance directly from the GLPI interface.

## Features

- Adds an AI Assistant button in the GLPI Assistance menu
- Seamlessly integrates RagFlow AI Assistant via iframe
- Simple and lightweight implementation
- No database modifications required
- Compatible with GLPI 10.x.x

## Known Issues

- The AI Assistant currently does not have an upload attachment button.

## Requirements

- GLPI >= 10.0.0
- PHP >= 7.4

## Installation

Perform the following operations on the GLPI server:

1. Download the latest release from GitHub
   ```bash
   cd ~
   git clone https://github.com/iamtornado/ragflow_glpi_plugin.git
   ```
2. Copy ragflow_glpi_plugin directory to your GLPI plugins directory and renmae it to ragflow:
   ```bash
   cd {GLPI_ROOT}/plugins  #example：cd /var/www/html/glpi/plugins
   cp -R ~/ragflow_glpi_plugin ragflow
   ```
3. Install and enable the plugin through the GLPI command line:
   ```bash
   cd {GLPI_ROOT}/plugins/ragflow  #example：cd /var/www/html/glpi/plugins/ragflow
   php {GLPI_ROOT}/bin/console cache:clear
   php {GLPI_ROOT}/bin/console plugin:install ragflow
   php {GLPI_ROOT}/bin/console plugin:enable ragflow
   ```

   Alternatively, you can install the plugin through the GLPI web interface:
   - Go to `Setup` > `Plugins`
   - Find the RagFlow plugin
   - Click on `Install` and then `Enable`
![alt text](glpi_ragflow_plugin.png)

4. Refresh your GLPI page

## Configuration

1. Go to `Setup` > `Plugins` > `RagFlow` > `Configuration`
   ![alt text](glpi_ragflow_plugin_configuration.png)
2. Enter your ragflow full embed iframe code and save the configuration,attention: You'll need to create the ragflow API first, and then get the full embed iframe code from ragflow.
   ![alt text](ragflow_fullembed_code.png)
![alt text](enter_ragflow_fullembed_code.png)

## Usage

1. After installation, you will find the "AI Assistant" button in the Tools menu
2. Click on the button to open the RagFlow AI Assistant interface
3. The AI Assistant will be displayed in the right panel of your GLPI interface
![alt text](AI_assistant.png)

## License

This plugin is licensed under the GNU General Public License v3.0 or later.

## Author

- Name: iamtornado
- Website: https://github.com/iamtornado
- Email: 1426693102@qq.com
- QQ group: 715152187
- WeChat Official Account: AI发烧友
![alt text](AI发烧友公众号宣传图片.png)

## Support

For bug reports or feature requests, please use the GitHub issue tracker.