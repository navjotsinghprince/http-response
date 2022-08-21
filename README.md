## HTTP Response Introduction
[![License](https://img.shields.io/github/license/navjotsinghprince/http-response)](https://github.com/navjotsinghprince/http-response)

Send HTTP json response with status codes automatically with ease pre-configured methods.


### Installation 

```bash
composer require princeferozepuria/http-response
```

### Import HTTPResponse

```bash
use Prince\Ferozepuria\HTTPResponse;
```


### Extending and Usage

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Prince\Ferozepuria\HTTPResponse;
use Illuminate\Support\Facades\Validator;

//Feel Free To Visit https://navjotsinghprince.com
class TestController extends HTTPResponse {
    

    /**
     * Example 1...
     */
    public function example1(Request $request)
    {
        $collection = collect([1, 2, 3]);

        $class_Obj = new \stdClass();
        $class_Obj->name="Prince Ferozepuria";

        $response = [
            "string" => "Prince Ferozepuria",
            "int" => 1,
            "boolean" => true,
            "array" => ["prince", "ferozepuria"],
            "collection" => $collection,
            "class_object" => $class_Obj,
            "is_null" => null,
            "is_empty" => "",
        ];

        return $this->sendSuccess("success",$response);

      }


    /**
     * Example 2...
     */
    public function example2(Request $request)
    { 
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email'=>'required|email'
        ]);

        if ($validator->fails()) {
            return $this->validationFailed("all fields are required", $validator->errors());
        }

      }


    /**
     * Example 3...
     * Usage With Custom Object
     */
    public function example3(Request $request)
    { 
        $data = ["name" => "Prince Ferozepuria"];

        $response = new HTTPResponse();
        return $response->sendSuccess("This is just test message", $data);

    }

      
    }
```


### Available Methods

```php
<?php

   $response = [
      "name" => "Prince Ferozepuria",
      "email" => "fzr@navjotsinghprince.com",
      "website" => "https://navjotsinghprince.com"
    ];

    return $this->sendSuccess("success response message", $response);

    return $this->sendSuccessForce("success force response message","total",$response);

    return $this->sendFailure("failed response message",$response);

    return $this->notFound("not Found response message",$response);

    return $this->validationFailed("validation failed response message",$response);
    
    return $this->forbidden("forbidden response message");

    return $this->unauthorized("unauthorized response message");

    return $this->dataProcessFailed("data process failed message");

```


## Authors
:point_right: [Navjot Singh Prince](https://github.com/navjotsinghprince)

See also the site of [contributor](https://navjotsinghprince.com)
who participated in this package.

## Contact
If you discover any question within package, please send an e-mail to Prince Ferozepuria via [fzr@navjotsinghprince.com](mailto:fzr@navjotsinghprince.com). Your all questions will be answered.

## Changelog
Please see [changelog.md](changelog.md) for what has changed recently.


## Buy Me A Coffee! :coffee: 
Feel free to buy me a coffee at [__Buy me a coffee! :coffee:__]( https://ko-fi.com/princeferozepuria), I would be really grateful for anything, be it coffee or just a kind comment towards my work, that helps me a lot.

## Donation
The package is completely free to use, however, it has taken a lot of time to build. If you would like to show your appreciation by leaving a small donation, you can do so by clicking here [here](https://www.paypal.com/paypalme/navjotsinghprince). Thanks!

## License
This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md)
file for details.