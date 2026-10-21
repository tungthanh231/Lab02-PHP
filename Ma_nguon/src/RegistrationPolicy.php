<?php
declare(strict_types=1);

final class RegistrationPolicy {
    public function decide(
        int $capacity,
        int $registered,
        bool $open,
        bool $waitingEnabled
    ): string {

        // Kiểm tra dữ liệu không hợp lệ
        if ($capacity <= 0 || $registered < 0 || $registered > $capacity) {
            return 'rejected';
        }

        // Sự kiện đã đóng
        if (!$open) {
            return 'rejected';
        }

        // Sự kiện vẫn còn chỗ
        if ($registered < $capacity) {
            return 'confirmed';
        }

        // Hết chỗ nhưng có danh sách chờ
        if ($waitingEnabled) {
            return 'waiting';
        }

        // Không còn chỗ và không có danh sách chờ
        return 'rejected';
    }
}
