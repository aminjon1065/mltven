import { TooltipProvider } from '@/components/ui/tooltip';
import AppLayoutTemplate from '@/layouts/app/app-sidebar-layout';
import { type BreadcrumbItem } from '@/types';
import { type ReactNode } from 'react';
import { Toaster } from 'sonner';

interface AppAdminLayoutProps {
    children: ReactNode;
    breadcrumbs?: BreadcrumbItem[];
}

export default ({ children, breadcrumbs, ...props }: AppAdminLayoutProps) => (
    <AppLayoutTemplate breadcrumbs={breadcrumbs} {...props}>
        <TooltipProvider>
            <Toaster closeButton richColors />
            <div className="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">{children}</div>
        </TooltipProvider>
    </AppLayoutTemplate>
);
