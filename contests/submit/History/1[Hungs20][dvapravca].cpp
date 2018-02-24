#include <bits/stdc++.h>
#define NAME "dvapravca"
#define FOR(i, a, b) for(int i = (a), _b = (b); i <= _b; ++i)
#define FORD(i,a ,b) for(int i = (a), _b = (b); i >= _b; --i)
#define ll long long
#define pb push_back
#define fi first
#define se second
using namespace std;
const int maxN = 2010;
int n;
int ans;
struct P {
	ll x, y;
	int id;
};
P a[maxN];
void io()
{
	freopen(NAME".inp", "r", stdin);
	freopen(NAME".out", "w", stdout);
}
ll kc(int i, int j, int k)
{
	ll _a = a[i].y - a[j].y;
	ll _b = a[j].x - a[i].x;
	ll _c = -_a * a[i].x - _b * a[i].y;
	return abs(_a * a[k].x + _b * a[k].y + _c);
}
bool check(int i, int j, int u, int v)
{
	ll _a = a[i].y - a[j].y;
	ll _b = a[j].x - a[i].x;
	ll _c = -_a * a[i].x - _b * a[i].y;

	ll x = _a * a[u].x + _b * a[u].y + _c;
	ll y = _a * a[v].x + _b * a[v].y + _c;
	if(x * y >= 0 && y != 0) return true;
	return false;

}
void proc()
{
	FOR(i, 1, n)
	{
		FOR(j, i + 1, n)
		{
			if(a[i].id == 1 && a[j].id == 1)
			{
				ll Min = 1e18, idmin = 0;
				ll _Min = 1e18, _idmin = 0;
				int res = 0, _res = 0;
				FOR(k, 1, n)
				{
					if(a[k].id == 0 && kc(i, j, k) < Min) 
					{
						Min = kc(i, j, k);
						idmin = k; 
					}
				}
				FOR(k, 1, n)
				{
					if(a[k].id == 0 && kc(i, j, k) < _Min && !check(i, j, idmin, k))
					{
						_Min = kc(i, j, k);
						_idmin = k;
					}
				}
				if(Min > 0 && Min < 1e18) {
					FOR(k, 1, n)
					{
						if(k != i && k != j && a[k].id == 1 && kc(i, j, k) < Min && check(i, j, k, idmin)) res++;
					}
					ans = max(ans, res + 2);
				}
				if(_Min > 0 && _Min < 1e18)
				{
					FOR(k, 1, n)
					{
						if(k != i && k != j  && a[k].id == 1 && kc(i, j, k) < _Min && check(i, j, k, _idmin)) _res++;
					}
					ans = max(ans, _res + 2);
				}
				//cout << i << " " << j << " " << res << " " << _res << " " << Min << " " << _Min<< "\n";
			}
		}
	}	
}

int main()
{
	io();
	scanf("%d", &n);
	char c;
	FOR(i, 1, n)
	{
		scanf("%lld %lld", &a[i].x, &a[i].y);
		scanf("\n%c", &c);
		if (c == 'R') a[i].id = 1;
		else a[i].id = 0;
	}
	proc();
	printf("%d", ans);
	return 0;
}
/*
8
2 -3 R
4 -1 R
-2 0 R
-3 1 B
-2 3 R
1 4 R
2 1 B
0 -3 B
*/