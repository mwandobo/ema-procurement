<?php

namespace App\Exports;

use App\Models\Accounting\ChartOfAccount;
use App\Models\Accounting\JournalEntry;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class IncomeStatementExport implements FromCollection, WithHeadings, WithTitle
{
    protected $start_date;
    protected $end_date;

    public function __construct($start_date, $end_date)
    {
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }

    public function collection()
    {
        $data = [];
        $total_income = 0;
        $total_expenses = 0;

        // Add income statement heading
        array_push($data, ['Income Statement: ' . $this->end_date]);
        array_push($data, ['GL Code', 'Account', 'Balance']);

        // Fetch income accounts and calculate the balance
        foreach (ChartOfAccount::where('account_type', 'income')->orderBy('gl_code', 'asc')->get() as $key) {
            $cr = JournalEntry::where('account_id', $key->id)->whereBetween('date', [$this->start_date, $this->end_date])->sum('credit');
            $dr = JournalEntry::where('account_id', $key->id)->whereBetween('date', [$this->start_date, $this->end_date])->sum('debit');
            $balance = abs($dr - $cr); // Ensure balance is always positive
            $total_income += $balance;
            array_push($data, [$key->gl_code, $key->name, number_format($balance, 2)]);
        }

        // Write total income at the end
        array_push($data, ['Total Income', '', number_format($total_income, 2)]);

        // Fetch expense accounts and calculate the balance
        foreach (ChartOfAccount::where('account_type', 'expense')->orderBy('gl_code', 'asc')->get() as $key) {
            $cr = JournalEntry::where('account_id', $key->id)->whereBetween('date', [$this->start_date, $this->end_date])->sum('credit');
            $dr = JournalEntry::where('account_id', $key->id)->whereBetween('date', [$this->start_date, $this->end_date])->sum('debit');
            $balance = abs($dr - $cr); // Ensure balance is always positive
            $total_expenses += $balance;
            array_push($data, [$key->gl_code, $key->name, number_format($balance, 2)]);
        }

        // Write total expenses and net profit at the end
        array_push($data, ['Total Expenses', '', number_format($total_expenses, 2)]);
        array_push($data, ['Net Profit', '', number_format(abs($total_income - $total_expenses), 2)]); // Ensure net profit is always positive

        return collect($data);
    }

    public function headings(): array
    {
        return ['GL Code', 'Account', 'Balance'];
    }

    public function title(): string
    {
        return 'Income Statement';
    }
}

