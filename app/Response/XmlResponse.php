<?php
/**
 * Created by PhpStorm.
 * User: leandrorichard
 * Date: 30/06/18
 * Time: 22:00
 */

namespace App\Response;


use Illuminate\Support\Facades\Response;

class XmlResponse
{
    private function header()
    {
        return [
            "Content-Type" => "application/xml"
        ];
    }

    public function toXML(\SimpleXMLElement $object, array $data, $level = 0, $status)
    {
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $new_object = $object->addChild(($level == 0) ? 'produto' : $key);
                $this->toXML($new_object, $value, $level + 1, $status);
            } else {
                $object->addChild($key, $value);
            }
        }


        return Response::make($object->asXML(), $status, $this->header());
    }
}