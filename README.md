# RagFlow Plugin for GLPI

This plugin integrates RagFlow AI Assistant into GLPI, providing users with easy access to AI assistance directly from the GLPI interface.

## Features

- Adds an AI Assistant button in the GLPI Assistance menu
- Seamlessly integrates RagFlow AI Assistant via iframe
- Simple and lightweight implementation
- No database modifications required
- Compatible with GLPI 10.0.x

## Requirements

- GLPI >= 10.0.0 and < 10.1.0
- PHP >= 7.4

## Installation

1. Download the latest release from GitHub
2. Extract the archive to your GLPI plugins directory:
   ```bash
   cd {GLPI_ROOT}/plugins
   cp -R ragflow-{version} ragflow
   ```
3. Install and enable the plugin through the GLPI command line:
   ```bash
   cd {GLPI_ROOT}
   php bin/console plugin:install ragflow
   php bin/console plugin:enable ragflow
   ```
   
   Alternatively, you can install the plugin through the GLPI web interface:
   - Go to `Setup` > `Plugins`
   - Find the RagFlow plugin
   - Click on `Install` and then `Enable`

4. Refresh your GLPI page

## Usage

1. After installation, you will find the "AI Assistant" button in the Assistance menu
2. Click on the button to open the RagFlow AI Assistant interface
3. The AI Assistant will be displayed in the right panel of your GLPI interface

## License

This plugin is licensed under the GNU General Public License v3.0 or later.

## Author

- Name: Your Name
- Website: Your Website
- Email: Your Email

## Support

For bug reports or feature requests, please use the GitHub issue tracker. 