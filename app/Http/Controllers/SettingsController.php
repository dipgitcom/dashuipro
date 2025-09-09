<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SettingsController extends Controller
{
    /**
     * Show Mail Settings form
     */
    public function mailSettings()
    {
        $settings = [
            'mail_mailer'      => env('MAIL_MAILER'),
            'mail_host'        => env('MAIL_HOST'),
            'mail_port'        => env('MAIL_PORT'),
            'mail_username'    => env('MAIL_USERNAME'),
            'mail_password'    => env('MAIL_PASSWORD'),
            'mail_encryption'  => env('MAIL_ENCRYPTION'),
            'mail_from_address'=> env('MAIL_FROM_ADDRESS'),
            'app_name'         => env('APP_NAME'),
        ];

        return view('backend.settings.mail', compact('settings'));
    }

    /**
     * Update Mail Settings and save to .env
     */
    public function mailstore(Request $request)
    {
        $request->validate([
            'mail_mailer'       => 'required|string',
            'mail_host'         => 'required|string',
            'mail_port'         => 'required|string',
            'mail_username'     => 'nullable|string',
            'mail_password'     => 'nullable|string',
            'mail_encryption'   => 'nullable|string',
            'mail_from_address' => 'required|string',
            'app_name'          => 'required|string',
        ]);

        try {
            $envPath = base_path('.env');

            if (!File::exists($envPath)) {
                return redirect()->back()->with('error', '.env file not found');
            }

            $envContent = File::get($envPath);
            $lineBreak = "\n";

            // Replace or add variables
            $envContent = preg_replace([
                '/MAIL_MAILER=(.*)/',
                '/MAIL_HOST=(.*)/',
                '/MAIL_PORT=(.*)/',
                '/MAIL_USERNAME=(.*)/',
                '/MAIL_PASSWORD=(.*)/',
                '/MAIL_ENCRYPTION=(.*)/',
                '/MAIL_FROM_ADDRESS=(.*)/',
                '/APP_NAME=(.*)/',
            ], [
                'MAIL_MAILER=' . $request->mail_mailer,
                'MAIL_HOST=' . $request->mail_host,
                'MAIL_PORT=' . $request->mail_port,
                'MAIL_USERNAME=' . $request->mail_username,
                'MAIL_PASSWORD=' . $request->mail_password,
                'MAIL_ENCRYPTION=' . $request->mail_encryption,
                'MAIL_FROM_ADDRESS="' . $request->mail_from_address . '"',
                'APP_NAME="' . $request->app_name . '"',
            ], $envContent);

            File::put($envPath, $envContent);

            return redirect()->back()->with('success', 'Mail settings updated successfully');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }
}
