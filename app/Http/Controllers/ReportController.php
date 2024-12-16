<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        // Получаем заявления только текущего пользователя
        $reports = Report::where('user_id', Auth::id())->get();

        // Передаем переменную $reports в представление
        return view('auth.report.index', compact('reports'));
    }

    public function create()
    {
        // Возвращаем представление для создания заявления
        return view('auth.report.create');
    }

    public function store(Request $request): RedirectResponse
    {
        // Валидация данных
        $request->validate([
            'number' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ]);

        // Создаем новое заявление, привязанное к текущему пользователю
        Report::create([
            'number' => $request->number,
            'description' => $request->description,
            'status_id' => 1, // Начальный статус
            'user_id' => Auth::id(), // ID текущего пользователя
        ]);

        // Перенаправляем на страницу со списком заявлений
        return redirect()->route('report.index');
    }
}
