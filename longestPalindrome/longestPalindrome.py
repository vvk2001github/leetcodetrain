class Solution:
    def longestPalindrome(self, s: str) -> str:

        str_len: int = len(s)

        if ( s == None or str_len < 1 ):
            return ""

        start: int = 0
        end: int = 0
        for i in range(str_len):
            len1: int = self.__expandAroundCenter(s, i, i)
            len2: int = self.__expandAroundCenter(s, i, i + 1)
            len3: int = max(len1, len2)
            if (len3 > end - start):
                start = i - (len3 - 1) // 2
                end = i + len3 // 2 
        return s[start:end + 1]

    def __expandAroundCenter(self, s: str, left: int, right: int) -> int:
        L: int = left
        R: int = right
        str_len: int = len(s)
        while( L >= 0 and R < str_len and s[L] == s[R]):
            L -= 1
            R += 1
        return R - L - 1

if __name__=='__main__':
    sol: Solution = Solution()
    print(sol.longestPalindrome('cbbd'))