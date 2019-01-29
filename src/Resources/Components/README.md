# About components
Luba uses many blade components to ease the layout development. Many of them resolves some logic to avoid repeating the same block of code.

## Registration

Every component is registered in the `Config/components.php` file. There you *must* specify it's file and tag. The component files are located in the `Resources/Components` folder. Components tags are always prefixed with `luba-`.

This is a sample component registration:

```php
// file: Config/components.php
return [
    // ...
    'Forms.Text' => [
        'tag' => 'input-text'
    ]
    // ...
]
```

In this example, the component's file is located in `Resources/Components/Forms/Text.blade.php`.

## Components

Below you can find a list with the components used along the platform.

### Forms/Text

Renders a text type input.

#### Parameters

| Name     | Type    | Required | Description                                                  |
| -------- | ------- | -------- | ------------------------------------------------------------ |
| name     | String  | required | The input name.                                              |
| label    | String  | required | The key used by translations.                                |
| required | Boolean | optional | The vanilla required attribute.                              |
| help     | String  | optional | The help card block name. It adds a brief description of the input if help card is present. |

#### Comments

The `name` parameter, will be used to set the input name and the key for check if there are any error for the field. The `label` parameter, also it's used for display the label `luba::forms.${label}`, placeholder `luba::forms.${label}_hint`, and _help card_ hints `luba::forms.${label}` and `luba::forms.help.${label}`.



### Forms/File

Renders a custom file type input.

#### Parameters

| Name     | Type    | Required | Description                                                  |
| -------- | ------- | -------- | ------------------------------------------------------------ |
| name     | String  | required | The input name.                                              |
| label    | String  | required | The key used by translations.                                |
| required | Boolean | optional | The vanilla required attribute.                              |
| help     | String  | optional | The help card block name. It adds a brief description of the input if help card is present. |

#### Comments

The `name` parameter, will be used to set the input name and the key for check if there are any error for the field. The `label` parameter, also it's used for display the label `luba::forms.${label}`, placeholder `luba::forms.${label}_hint`, and _help card_ hints `luba::forms.${label}` and `luba::forms.help.${label}`. If _placeholder_ is not defined, the default value will be `luba::forms.choose_file`.



### Forms/Select

Renders a custom select with options.

#### Parameters

| Name     | Type    | Required | Description                                                  |
| -------- | ------- | -------- | ------------------------------------------------------------ |
| name     | String  | required | The input name.                                              |
| label    | String  | required | The key used by translations.                                |
| required | Boolean | optional | The vanilla required attribute.                              |
| :options | Array   | required | An array or collection to loop through for generating options |
| key      | String  | required | The object's key value to set in the option                  |
| value    | String  | required | The object's key to display in the option                    |
| help     | String  | optional | The help card block name. It adds a brief description of the input if help card is present. |

#### Comments

The `name` parameter, will be used to set the input name and the key for check if there are any error for the field. 

The `label` parameter, also it's used for display the label `luba::forms.${label}`, placeholder `luba::forms.${label}_hint`, and _help card_ hints `luba::forms.${label}` and `luba::forms.help.${label}`.

If you want a different options rendering behavior, it's not necessary to set __key__, __value__ and __options__ parameters. You can use the component's `$slot:`

```php+HTML
<luba-select
    name="project_id"
    label="search.project_title">
	@foreach ($whatever as $item)
    <!-- -->
</luba-select>
```

