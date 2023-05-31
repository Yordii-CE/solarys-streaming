<?php

class Api extends ControllerBase
{

    private function createResponse($status, $statusText, $data = null, $details = null)
    {
        $response = [
            "status" => $status,
            "statusText" => $statusText,
            "details" => $details,
        ];

        if ($status == 200) $response["data"] = $data;

        return json_encode($response);
    }

    public function ok($data = null, $details = null)
    {
        echo $this->createResponse(200, "ok", $data, $details);
    }

    public function fail($details = null)
    {
        echo $this->createResponse(400, "fail", null, $details);
    }

    public function error($details = null)
    {
        echo $this->createResponse(500, "error", null, "Server error: " . $details);
    }
}
