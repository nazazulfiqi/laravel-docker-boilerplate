<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class PermissionWebController extends Controller
{
    public function index()
    {

        return view('permissions.index');
    }

    public function create()
    {
        return view('permissions.create');
    }
    public function save(Request $request)
    {
        $data = $request->only('name'); // jangan validate dulu

        $token = session('jwt_token');

        $response = Http::withToken($token)
            ->asForm()
            ->post(config('app.api_url') . '/api/permissions', $data);




        // Token expired / unauthorized
        if ($response->status() === 401) {
            return redirect()->route('login')->withErrors([
                'token' => 'Session expired. Please login again.'
            ]);
        }

        if ($response->status() === 422) {
            $errors = $response->json('errors');
            $flatErrors = [];
            foreach ($errors as $field => $msgs) {
                $flatErrors[$field] = $msgs[0] ?? 'Validation failed';
            }
            return back()->withErrors($flatErrors)->withInput();
        }

        if ($response->failed()) {
            return back()->withErrors(['name' => 'Failed to create permission'])->withInput();
        }

        ToastMagic::success('Permission Created', 'New permission added successfully.');
        return redirect()->route('permissions');
    }

    public function edit($id)
    {
        $token = session('jwt_token');

        $response = Http::withToken($token)
            ->get(config('app.api_url') . "/api/permissions/$id");

        if ($response->status() === 401) {
            return redirect()->route('login')->withErrors([
                'token' => 'Session expired. Please login again.'
            ]);
        }

        // if ($response->failed()) {
        //     abort(404, 'Permission not found');
        // }

        $permission = $response->json('data');

        return view('permissions.edit', compact('permission'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->only('name');
        $token = session('jwt_token');

        $response = Http::withToken($token)
            ->asForm()
            ->put(config('app.api_url') . "/api/permissions/$id", $data);

        if ($response->status() === 401) {
            return redirect()->route('login')->withErrors([
                'token' => 'Session expired. Please login again.'
            ]);
        }

        if ($response->status() === 422) {
            $errors = $response->json('errors');
            $flatErrors = [];
            foreach ($errors as $field => $msgs) {
                $flatErrors[$field] = $msgs[0] ?? 'Validation failed';
            }
            return back()->withErrors($flatErrors)->withInput();
        }

        if ($response->failed()) {
            return back()->withErrors(['name' => 'Failed to update permission'])->withInput();
        }

        ToastMagic::success('Updated', 'Permission updated successfully.');
        return redirect()->route('permissions');
    }


    public function delete($id)
    {
        $token = session('jwt_token');

        $response = Http::withToken($token)
            ->delete(config('app.api_url') . "/api/permissions/$id");

        if ($response->status() === 401) {
            return redirect()->back()->with('error', 'Unauthorized');
        }

        if ($response->failed()) {
            return redirect()->back()->with('error', 'Failed to delete');
        }

        ToastMagic::success('Deleted', 'Permission deleted successfully.');
        return redirect()->route('permissions')
            ->with('success', 'Permission deleted');
    }
}
