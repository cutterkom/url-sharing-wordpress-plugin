URL Sharing WordPress Plugin
============================

The URL Sharing Plugin adds a text field with the post URL at the end of your posts – a [qz.com](http://qz.com) like sharing approach. A button enables copying the URL to the user’s clipboard.

The plugin can be used as a more privacy-friendly alternative to sharing buttons or as an additional sharing-option.

I was inspired by [Dominik's post](http://do-s.de/Blogger-macht-es-euren-Lesern-leichter/) about readability and usability on blogs (in German) who uses the Quartz-like approach – something I wanted to have, too.


## Installation

Upload the files in your plugins directory. Then activate it.
For a label in front of the URL, go to the settings page and insert your text in the input field. Of course, you can leave it blank, too.
Settings

## Change style

You can change the styling by adding your changes to stylesheet of the plugin. In the default version the css classes .url_share_label and .url_share_input don't have values, in order to align to your theme visually. Moreover there are two classes to control the states for the copy-to-clipboard-button: .zeroclipboard-is-hover and .zeroclipboard-is-active.


## Versions
### 1.1
Button to copy URL to user’s clipboard by using [ZeroClipBoard](https://github.com/zeroclipboard/zeroclipboard)

### 1.0
Initial version: Input line with post URL

## To-do List

Things that might be considered in the future:

* Enable font color change of the URL in backend
* Offer a PHP-Snippet to enable more flexible positioning
