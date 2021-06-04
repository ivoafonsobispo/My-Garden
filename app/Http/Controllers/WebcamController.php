<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class WebcamController extends Controller
{
    public function face_recognition()
    {
        $process = Process::fromShellCommandline('xvfb-run python3 /srv/www/my-garden/public/py/face-recognition.py');
        // $process = new Process(['xvfb-run python3', public_path().'/py/hello.py']);
        try {
            $process->mustRun();
            echo $process->getOutput();
        } catch (ProcessFailedException $exception) {
            echo $exception->getMessage();
        }

        $process->stop();

        // $output = shell_exec('xvfb-run python3 /srv/www/my-garden/public/py/hello.py 2>&1');
        // echo $output;
    }
}
