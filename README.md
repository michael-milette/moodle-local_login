<img src="pix/logo.png" align="right" />

Local Login plugin for Moodle
=================================
![PHP](https://img.shields.io/badge/PHP-v5.6%20to%20v8.3%20-blue.svg)
![Moodle](https://img.shields.io/badge/Moodle-v3.7%20to%20v4.4.x-orange.svg)
[![GitHub Issues](https://img.shields.io/github/issues/michael-milette/moodle-local_login.svg)](https://github.com/michael-milette/moodle-local_localissues)
[![Contributions welcome](https://img.shields.io/badge/contributions-welcome-green.svg)](#contributing)
[![License](https://img.shields.io/badge/License-GPL%20v3-blue.svg)](#license)

# Table of Contents

- [Local Login plugin for Moodle](#local-login-plugin-for-moodle)
- [Table of Contents](#table-of-contents)
- [Basic Overview](#basic-overview)
- [Requirements](#requirements)
- [Download Local Login for Moodle](#download-local-login-for-moodle)
- [Installation](#installation)
- [Usage](#usage)
- [Updating](#updating)
- [Uninstallation](#uninstallation)
- [Limitations](#limitations)
- [Language Support](#language-support)
- [FAQ](#faq)
    - [Are there any security considerations?](#are-there-any-security-considerations)
  - [Other questions](#other-questions)
- [Contributing](#contributing)
  - [Contributors](#contributors)
  - [Pending Features](#pending-features)
- [Motivation for this plugin](#motivation-for-this-plugin)
- [Further information](#further-information)
- [License](#license)

# Basic Overview
The Local Login module for Moodle allows users, with local login accounts, such as administrators, to be able to login even if the custom login URL is pointing to some other page such as Oauth2 or other identity management system. The local login page only offers the option of logging in using a local Moodle account.

This is also an example of how to create a custom login page.

[(Back to top)](#table-of-contents)

# Requirements

This plugin requires Moodle 3.7+ from https://moodle.org

[(Back to top)](#table-of-contents)

# Download Local Login for Moodle

The most recent STABLE release of Local Login for Moodle is available from:
https://moodle.org/plugins/local_login

The most development release can be found at:
https://github.com/michael-milette/moodle-local_login

[(Back to top)](#table-of-contents)

# Installation

Install the plugin, like any other plugin, to the following folder:

    /local/login

See https://docs.moodle.org/en/Installing_plugins for details on installing Moodle plugins.

There are no special considerations required for updating the plugin.

[(Back to top)](#table-of-contents)

# Usage

There are no configurable settings for this plugin at this time.

Once installed, login to Moodle by using a URL similar to https://example.com/local/login

[(Back to top)](#table-of-contents)

# Updating

There are no special considerations required for updating the plugin.

The first public ALPHA version was released on 2019-12-06.

For more information on releases since then, see [CHANGELOG.md](https://github.com/michael-milette/moodle-local_login/blob/master/CHANGELOG.md).

[(Back to top)](#table-of-contents)

# Uninstallation

Uninstalling the plugin by going into the following:

Home > Administration > Site Administration > Plugins > Manage plugins > Login

...and click Uninstall. You may also need to manually delete the following folder:

    /local/login

[(Back to top)](#table-of-contents)

# Limitations

If you fail to login, you will be taken to the site's normal login page.

[(Back to top)](#table-of-contents)

# Language Support

This plugin uses language strings from the Moodle language packs.

If you need a different language that is not yet supported, please feel free
to contribute using the Moodle AMOS Translation Toolkit for Moodle at
https://lang.moodle.org/

This plugin has not been tested for right-to-left (RTL) language support.
If you want to use this plugin with a RTL language and it doesn't work as-is,
feel free to prepare a pull request and submit it to the project page at:

https://github.com/michael-milette/moodle-local_login

[(Back to top)](#table-of-contents)

# FAQ

### Are there any security considerations?

There are no special security considerations for this plugin.

## Other questions

Got a burning question that is not covered here? If you still can't find your answer, submit your question in the Moodle forums or open a new issue on Github at:

https://github.com/michael-milette/moodle-local_login/issues

[(Back to top)](#table-of-contents)

# Contributing

If you are interested in helping, please take a look at our [contributing](https://github.com/michael-milette/moodle-local_login/blob/master/CONTRIBUTING.md) guidelines for details on our code of conduct and the process for submitting pull requests to us.

## Contributors

Michael Milette - Author and Lead Developer

## Pending Features

Let us know if you have any suggestions.

[(Back to top)](#table-of-contents)

# Motivation for this plugin

The development of this plugin was motivated through our own experience in Moodle development and comments in the Moodle support forums. It is supported by TNG Consulting Inc.

[(Back to top)](#table-of-contents)

# Further information

For further information regarding the local_login plugin, support or to report a bug, please visit the project page at:

https://github.com/michael-milette/moodle-local_login

[(Back to top)](#table-of-contents)

# License

Copyright © 2019-2024 TNG Consulting Inc. - https://www.tngconsulting.ca/

This file is part of Local Login for Moodle - https://moodle.org/

Local Login is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

Local Login is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Local Login.  If not, see <https://www.gnu.org/licenses/>.

[(Back to top)](#table-of-contents)
