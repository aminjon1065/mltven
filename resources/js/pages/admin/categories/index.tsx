import AppAdminLayout from '@/layouts/app-admin-layout';
import { BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/react';

const breadcrumbs: BreadcrumbItem[] = [
    { title: 'Дашборд', href: '/admin/dashboard' },
    { title: 'Категории', href: '/admin/categories' },
];

const Index = ({categories}) => {
    console.log(categories);
    return (
        <AppAdminLayout breadcrumbs={breadcrumbs}>
            <Head title={'Категории'} />
            categories
        </AppAdminLayout>
    );
};

export default Index;
